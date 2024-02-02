package uk.ac.rhul.cs2800;

/**
 * This class is a part of a factory design pattern which is used to Multiply two operands together.
 * This implements an interface called OperatorType.
 *
 * @author anish
 *
 */
public class MultiplyOperation implements OperatorType {

  /**
   * Multiplies two operands together.
   *
   * @param operand1 an operand to be multiplied with
   * @param operand2 an operand to be multiplied with
   * @return the result of the multiplication
   */
  @Override
  public float calculate(float operand1, float operand2) {
    float result = operand1 * operand2;

    try {
      if (result >= Float.POSITIVE_INFINITY) {
        throw new ArithmeticException("OVERFLOW");
      }
    } catch (ArithmeticException e) {
      // Print error to err output.
      System.err.println(e);
    }

    return result;



  }

}
