package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import org.junit.jupiter.api.Test;

class OperatorFactoryTest {

  private OperatorType op;


  /*
   * Test 1 - This test should allow me to create instances of new classes which will allow me to
   * enforce a specific arithmetic operation. To pass this I had to make sure that in
   * operatorFactory, it returned the right class which will carry out the arithmetic operation. I
   * also had to make sure that DivideOperation.java implemented the interface operatorType and its
   * methods
   */
  @Test
  void DivisionOperation() {
    op = OperatorFactory.enumType(Symbol.DIVIDE);
    assertEquals(DivideOperation.class, (op.getClass()),
        "A new class which implements the operatorType interface should be created");

  }

  /*
   * Test 2 - Similar to test 1 but we need to check that the class returned for Symbol.TIMES is
   * indeed a nultiplication class which will implement the interface. Although this test allowed me
   * to create the class, it still failed as return type in OperatorFactory wasn't correct. So I
   * have to implement switch statements to make sure the right class is returned. When I then
   * created the switch statements an error kept coming up because the class -
   * MultiplyOperation.java did not have the interface nor did it implement its methods. Once I
   * fixed all of these the test passed
   */
  @Test
  void MulitplyOperator() {
    op = OperatorFactory.enumType(Symbol.TIMES);
    assertEquals(MultiplyOperation.class, (op.getClass()),
        "A new class which implements the operatorType interface should be created");

  }

  /*
   * Test 3 - This is the same principle as the two previous tests. REFACTORED: Removed OAOO code
   * smell by creating the OperatorType for each Symbol as a field instead of creating it each time
   */
  @Test
  void PlusOperator() {
    op = OperatorFactory.enumType(Symbol.PLUS);
    assertEquals(PlusOperation.class, (op.getClass()),
        "A new class which implements the operatorType interface should be created");

  }

  /*
   * Test 4 - This is the same principle as the two previous tests.
   */
  @Test
  void MinusOperator() {
    op = OperatorFactory.enumType(Symbol.MINUS);
    assertEquals(MinusOperation.class, (op.getClass()),
        "A new class which implements the operatorType interface should be created");

  }

}
