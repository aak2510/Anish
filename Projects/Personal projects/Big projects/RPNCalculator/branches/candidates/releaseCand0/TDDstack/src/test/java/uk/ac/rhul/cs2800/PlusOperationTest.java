package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;

class PlusOperationTest {

  /*
   * Test 1 - Simple test to see if we can add two numbers and return the result
   */
  @Test
  void additionTest() {
    PlusOperation plus = new PlusOperation();
    assertEquals(150, plus.calculate(100f, 50), "Simple test should return 150");
    assertEquals(151, plus.calculate(100.5030f, 50.4970f), "Simple test should return 150");
    assertEquals(50f, plus.calculate(100f, -50f), "Simple test should return 150");
    assertEquals(-151, plus.calculate(-100.5f, -50.5f), "Simple test should return 150");
    


  }
}
