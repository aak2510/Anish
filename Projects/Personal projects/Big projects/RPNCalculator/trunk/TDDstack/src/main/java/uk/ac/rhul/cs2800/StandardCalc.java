package uk.ac.rhul.cs2800;

/**
 * Evaluates infix string expressions. This class implements the shunting yard which changes an
 * infix expression to postfix notation. To do this it uses the OpStack and various forms of error
 * checking. On top of this we need to make sure that we don't repeat code, therefore once converted
 * to postfix, the expression is passed to the RevPolishCalc to be evaluated.
 *
 * @author anish
 *
 */
public class StandardCalc implements Calculator {



  private OpStack opStack = new OpStack();
  private RevPolishCalc rpCalc = new RevPolishCalc();


  /**
   * Grabs the precedence level of an operator. This will determine whether an operator is pushed of
   * a stack or not.
   *
   * @param operator whose precedence level we are trying to find
   * @return the precendence level
   */
  public int getPrecedenceLevel(String operator) {
    if (operator.equals("+") || operator.equals("-")) {
      return 1;
    }
    if (operator.equals("*") || operator.equals("/")) {
      return 2;
    }
    return 0;
  }

  /**
   * Check that the expression has the same number of open brackets and close brackets.
   *
   * @param expression infix expression
   * @return true if the number of brackets in the expression are equals, false otherwise
   */
  public boolean bracketsChecker(String expression) {
    int openBrackets = 0;
    int closedBrackets = 0;
    String[] input = expression.split("\\s");
    for (int i = 0; i < input.length; i++) {
      if (input[i].equals("(")) {
        openBrackets++;
      } else if (input[i].equals(")")) {
        closedBrackets++;
      }
    }
    return (closedBrackets == openBrackets);
  }


  /**
   * Check if the arguement passed through is a valid symbol that is contained within the enum class
   * Symbol. If the corresponding enum value is found, it is returned. Else an generic Symbol of
   * value INVALID is returned
   *
   * @param test arguement to check in Symbol.java
   * @return The Enum value of the string parameter if a corresponding Symbol exits, else INVALID is
   *         returned
   */
  public Symbol operatorSymbol(String test) {

    for (Symbol c : Symbol.values()) {
      if (c.toString().equals(test)) {
        return c;
      }
    }

    return Symbol.INVALID;
  }

  /**
   * Has a series of checks used to validate an infix expression. Here we check that the expression
   * arguement is not null, has no letters, has operators, equal number of brackets and if the
   * entire expression contains a number of brackets and operators.
   *
   * @param expression to be checked if valid
   * @return true if the expression is a valid infix expression, false otherwise
   * @throws InvalidException if the expression is not a valid infix expression
   */
  public boolean expressionChecker(String expression) throws InvalidException {
    // isBlank() is the same as expression.trim().isEmpty(), however it depends on which version of
    // java you are running. I am assuming java 11.
    if (expression == null || expression.isBlank()) {
      return false;
    }

    // If at any point we encounter a letter, we can just return false straight away, all numbers
    // and operators will be looked over.
    for (int i = 0; i < expression.length(); ++i) {
      if (Character.isLetter(expression.charAt(i))) {
        return false;
      }
    }

    // An expression is only valid if it contains brackets and operators so we need to check for
    // this aswell
    String[] values = expression.split("\\s");
    for (int i = 0; i < values.length; i++) {
      if (values[i].matches("[-+]?\\d+(\\.\\d+)?") || (values[i].matches("[-+*/()]"))) {
        continue;
      } else {
        return false;
      }
    }


    // If we don't encounter any operator at all then its not a valid expression
    int opCounter = 0;
    for (int i = 0; i < values.length; i++) {
      if (!(operatorSymbol(values[i]) == Symbol.INVALID)) {
        opCounter++;
      }
    }
    if (opCounter == 0) {
      return false;
    }

    // After all checks prior, All thats left to check is the number of bracket, so we can just
    // return the result of this
    return bracketsChecker(expression);


  }

  /**
   * Converts an infix expression to postfix.
   * 
   * @param expression to be converted to postfix
   * @return Reverse Polish expression equivalent to the infix expression
   */
  public String shuntingYard(String expression) {
    String postfixExpression = "";
    String[] expressionSplit = expression.split("\\s");


    for (String value : expressionSplit) {
      // If value is not an operator
      if (operatorSymbol(value) == Symbol.INVALID) {
        // then its an operand and we can add it to the output string
        postfixExpression += value + " ";
      } else if (value.equals("(")) {
        opStack.push(operatorSymbol(value));

      } else if (value.equals(")")) {
        while (!opStack.isEmpty() && (!opStack.top().toString().equals("("))) {
          postfixExpression += opStack.pop() + " ";
        }
        opStack.pop();
      } else {
        // otherwise its an operator and if the stack does have other operators on it, compare the
        // precedence of the top of the stack to the currrent one.
        while (!opStack.isEmpty()
            && getPrecedenceLevel(value) <= getPrecedenceLevel(opStack.top().toString())) {
          // Pop the stack operator if it has a lower precedence
          postfixExpression += opStack.pop() + " ";
        }
        // push operator onto stack is empty or current operator has lower precedence
        opStack.push(operatorSymbol(value));
      }
    }
    while (!opStack.isEmpty()) {
      try {
        if (opStack.top().toString().equals("(")) {
          throw new InvalidException(
              "This is not a valid expression. You have entered too many brackets");
        }
      } catch (InvalidException e) {
        // Do nothing
      }
      postfixExpression += opStack.pop() + " ";
    }
    return postfixExpression.substring(0, postfixExpression.length() - 1);


  }


  /**
   * Calculate the result of an infix expression.
   * 
   * @param expression to be evaluated
   * @return the result of the infix expression
   * @throws InvalidException if the passed through expression is not of a valid form
   */
  @Override
  public float evaluate(String expression) throws InvalidException {
    // First we need to convert the expression to postfix
    // then we delegate the computation of this to RevPolishCalc
    return rpCalc.evaluate(shuntingYard(expression));


  }


}
