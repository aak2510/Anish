package uk.ac.rhul.cs2800;

/**
 * This class is a part of a factory design pattern which is used to add two operands. This
 * implements an interface called OperatorType.
 * 
 * @author anish
 *
 */
public class PlusOperation implements OperatorType {

  /**
   * Adds two operands together.
   *
   * @param operand1 the operand being added
   * @param operand2 the operand being added
   * @return the result of the addition
   */
  @Override
  public float calculate(float operand1, float operand2) {

    return operand1 + operand2;
  }

}
