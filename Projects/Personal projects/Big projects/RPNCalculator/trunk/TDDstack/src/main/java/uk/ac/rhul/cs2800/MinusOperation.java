package uk.ac.rhul.cs2800;

/**
 * This class is a part of a factory design pattern which is used to subtract one operand from
 * another. This implements an interface called OperatorType.
 *
 * @author anish
 *
 */
public class MinusOperation implements OperatorType {

  /**
   * Calculates the subtraction of two operands.
   *
   * @param operand1 the value being subtracted
   * @param operand2 the value being subtracted from
   * @return the result of the subtraction
   */
  @Override
  public float calculate(float operand1, float operand2) {

    return operand2 - operand1;

  }

}
