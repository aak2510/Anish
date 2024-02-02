package uk.ac.rhul.cs2800;

/**
 * This interface is used alongside the operator Factory which will be used to calculate the
 * expression on the operator specifed by the factory.
 *
 * @author anish
 *
 */
public interface OperatorType {
  /**
   * Calculates an expression on an operator instance.
   *
   * @param operand1 the number being used in the calculation
   * @param operand2 the number being used in the calculation
   * @return the result of the operated value
   */
  public float calculate(final float operand1, final float operand2);
}
