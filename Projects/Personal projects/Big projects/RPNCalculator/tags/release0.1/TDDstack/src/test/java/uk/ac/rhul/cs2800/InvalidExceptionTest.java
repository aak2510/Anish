package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;

class InvalidExceptionTest {

  @Test // Test 1 - To pass this test, I had to pass through an invalid RPN expression to
        // RevPolishCalc and then I had to make a class which extended
  // the exceptions class. Then I had to make sure that a call to the super class was made
  // within the constructor
  void invalidExceptionTest() {
    RevPolishCalc rpn = new RevPolishCalc();
    assertThrows(InvalidException.class, () -> rpn.evaluate("+ 8 5"),
        "This action should cause an exception to be thrown");
  }

  @Test // Test 2 - To pass this test I had to change the InvalidExcpetion test class to implement a
  // constructor with a string arguement and then passing that arguement through a call to the
  // super class - Exception
  void testcustomMessage() {
    InvalidException iv = new InvalidException("Invalid RPN expression");
    assertEquals("Invalid Exception: Invalid RPN expression", iv.getMessage(),
        "Custom message should return in the correct format");

  }
}
