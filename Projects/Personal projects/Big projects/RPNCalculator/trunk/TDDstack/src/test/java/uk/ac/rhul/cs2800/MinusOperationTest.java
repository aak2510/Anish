package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import org.junit.jupiter.api.Test;

class MinusOperationTest {


  /*
   * Test 1 - As the default return is already 0, we know that this works. So we now need to update
   * to check that actual subtraction works. First we need to check if overflows/underflow errors
   * are handled. To pass this test we need to update subtraction to return the 2nd operand - 1st
   * operand because just like division, the order of the operands matter.
   */
  @Test
  void test() {
    MinusOperation minus = new MinusOperation();
    assertEquals(488, minus.calculate(512, 1000));
    assertEquals(510, minus.calculate(-500, 10));
    assertEquals(-5, minus.calculate(-5, -10));
    assertEquals(-15, minus.calculate(5, -10));
    
    

  }
}
