package uk.ac.rhul.cs2800;

/**
 * This class is a part of a factory design pattern which is used to Divide two operands. This
 * implements an interface called OperatorType.
 * 
 * @author anish
 *
 */
public class DivideOperation implements OperatorType {


  /**
   * Divides two operands.
   *
   * @param denominator the divisor
   * @param numerator the dividend
   * @return the quotient
   */
  @Override
  public float calculate(float denominator, float numerator) {
    // If the numeraotr is 0, we can just return 0 instead of NaN (Not a Number).
    if (numerator == 0) {
      return 0;
    }

    // If User tries to divide by 0
    if (denominator == 0) {

      // This WILL throw an exception
      try {
        // Convert to int so that we can throw the Arithmetic Exception
        return (int) numerator / (int) denominator;
      } catch (ArithmeticException e) {
        // Print error to err output.
        System.err.println("Cannot divide by 0: " + e);
      }

    }


    return numerator / denominator;
  }

}
