package uk.ac.rhul.cs2800;

/**
 * Allows for the calculation of String expressions.
 *
 * @author anish
 *
 */
public interface Calculator {


  /**
   * Used to calculate an expression.
   *
   * @param expression the expression to be evaluated
   * @return the evaluated expression
   * @throws InvalidException if the expression is not in the correct form required
   */
  public float evaluate(String expression) throws InvalidException;

}
