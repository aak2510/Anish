package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class MultiplyTest {

  private MultiplyOperation multiply;

  @BeforeEach
  void create() {
    multiply = new MultiplyOperation();
  }



  /*
   * Test 1 - First test we need to check is that an overflow is reported. In java, an overflow
   * returns as Infinity. So we need to check that multiplying the max value by another number
   * returns infinity. If it does we need to print out to the ouput stream
   */
  @Test
  void overflowTest() {
    MultiplyOperation multiply = new MultiplyOperation();
    assertEquals(Float.POSITIVE_INFINITY, multiply.calculate(Float.MAX_VALUE, 2),
        "This action should cause an Infinity to be retuned which is an overflow");



  }

  /*
   * Test 2 - Check if normal multiplication can take place. REFACTORED removed OAOO code smell of
   * calling object multiple times
   */
  @Test
  void multiplyNormalTest() {

    assertEquals(50, multiply.calculate(25, 2), "Should return a normal float");
    assertEquals(-200, multiply.calculate(-100, 2), "Should return a normal float");
    assertEquals(100, multiply.calculate(-25, -4), "Should return a normal float");
    assertEquals(-114.75f, multiply.calculate(25.5f, -4.5f), "Should return a normal float");
  }

}
