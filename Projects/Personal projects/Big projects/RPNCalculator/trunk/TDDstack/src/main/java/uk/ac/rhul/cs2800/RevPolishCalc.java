package uk.ac.rhul.cs2800;

/**
 * Evaluate Reverse Polish String expressions.
 *
 * @author anish
 *
 */
public class RevPolishCalc implements Calculator {

  /**
   * Private stack field to delgate all stack operations.
   */
  private NumStack numValues = new NumStack();


  /**
   * Used to determine if the expression is in a valid postfix notation.
   *
   * @param expression the expression to be checked
   * @throws InvalidException if the expression is not correctly formatted as a postfix expression
   */
  public void errorChecking(String expression) throws InvalidException {
    int operators = 0;
    int operands = 0;


    /*
     * isBlank() is the same as expression.trim().isEmpty(), however it depends on which version of
     * java you are running. I am assuming java 11.
     */
    if (expression == null || expression.isBlank()) {
      throw new InvalidException("Expression is null or empty. Please enter an expression.");
    }
    for (int i = 0; i < expression.length(); ++i) {
      if (Character.isLetter(expression.charAt(i))) {
        throw new InvalidException("Please enter a numerical expression without any letters");
      }
    }

    /*
     * Split has to be done here to stop splitting a potential null input for split- which would
     * throw a null pointer exception
     */
    String[] values = expression.split(" ");
    for (String value : values) {
      if ((value.equals("+") || value.equals("-") || value.equals("*") || value.equals("/"))) {
        operators++;
      } else {
        operands++;
      }
    }

    /* RPN law: # of Operands = # of Operators + 1 */
    if (!(operands == (operators + 1))) {
      throw new InvalidException(
          "Invalid RPN expression - The Number of operands should be = number of operators + 1");
    }


  }


  /**
   * Check if the arguement passed through is contained within the enum class Symbol. If the
   * corresponding enum value is found, it is returned. Else an generic Symbol of value INVALID is
   * returned
   *
   * @param test arguement to check in Symbol.java
   * @return The Enum value of the string parameter if a corresponding Symbol exits, else INVALID is
   *         returned
   */
  public Symbol validOperator(String test) {

    for (Symbol c : Symbol.values()) {
      if (c.toString().equals(test)) {
        return c;
      }
    }

    return Symbol.INVALID;
  }


  /**
   * Used to calculate a postfix expression.
   *
   * @param expression the expression to be evaluated
   * @return the evaluated expression
   * @throws InvalidException if the expression is not in the correct form required
   */
  @Override
  public float evaluate(String expression) throws InvalidException {

    // Check if incorrect expression
    errorChecking(expression);


    // Split the expression for iterating and final check on errors
    String[] values = expression.split(" ");


    /*
     * If we have a single value in the stack at this point, then we can just return it. As we know
     * // it can only be an operand. If it was an operator the "Law" # of Operands = # of Operators
     * + 1 would be violated
     */
    if (values.length == 1) {
      return Float.valueOf(values[0]);
    }

    // Final check that the first 2 values of the split array are indeed values. As for an RPN
    // expression the first two values will ALWAYS have to be numbers
    boolean isNumeric =
        (values[0].matches("[-+]?\\d+(\\.\\d+)?") && (values[1].matches("[-+]?\\d+(\\.\\d+)?")));
    if (!(isNumeric)) {
      throw new InvalidException("Invalid RPN expression.");
    }

    // Evaluation
    // These are going to be the popped values from the stack
    float operand1 = 0;
    float operand2 = 0;
    Symbol operator;
    // Iterate throught the split string
    for (String item : values) {
      // If the current item is a valid Symbol
      if ((operator = validOperator(item)) != Symbol.INVALID) {
        operand1 = numValues.pop();
        operand2 = numValues.pop();
        /*
         * gets the operator class to calculate expression & pushes on the calculation from the
         * operator class to the stack
         */
        OperatorType op = OperatorFactory.enumType(operator);
        numValues.push(op.calculate(operand1, operand2));

      } else {
        // If its not a symbol then its a number
        numValues.push(Float.valueOf(item));
      }
    }


    return numValues.pop();
  }

}
