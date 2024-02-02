package uk.ac.rhul.cs2800;

/**
 * This is an overall model of the calculator which evaluates expressions of infix and postfix. Also
 * used to store the result of each of the calculators.
 * 
 * @author anish
 *
 */
public class CalcModel {

  private Calculator standard = new StandardCalc();
  private Calculator revPolish = new RevPolishCalc();
  private StrStack revPolishStrStack = new StrStack();
  private StrStack standardStrStack = new StrStack();

  /**
   * Evaluates an arithmetic expression.
   *
   * @param expression the expression to be evaluated
   * @param infix determines whether the expression should be calculated using infix or postfix
   *        notation
   * @return evaluated expression
   */
  public float evaluate(String expression, boolean infix) {
    String stackValue;
    float result;

    try {
      if (infix) {
        result = standard.evaluate(expression);
        stackValue = String.valueOf(result);
        standardStrStack.push(stackValue);

        return result;



      } else {
        result = revPolish.evaluate(expression);
        stackValue = String.valueOf(result);
        revPolishStrStack.push(stackValue);
        return result;
      }
    } catch (InvalidException e) {
      System.err.println("Error: " + e);
    }


    return Float.POSITIVE_INFINITY;


  }



}
