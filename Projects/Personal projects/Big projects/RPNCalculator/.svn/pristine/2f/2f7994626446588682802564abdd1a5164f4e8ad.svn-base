package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import org.junit.jupiter.api.Test;

class ExceptionTest {

  @Test // Test 1 - To pass this test, I had to make sure that I created an entry which had a
        // different type to the getter I was using and then I had to make a class which extended
        // the exceptions class. Then I had to make sure that a call to the super class was made
        // within the constructor
  void testGetSymbol() {
    Entry newEntry = new Entry(Symbol.RIGHT_BRACKET);
    assertThrows(BadTypeException.class, () -> newEntry.getValue(),
        "This action should cause an exception to be thrown");
  }

  @Test // Test 2 - To pass this test I had to change the Excpetion test class to implement a
        // constructor with a string arguement and then passing that arguement through a call to the
        // super class - Exception
  void testcustomMessage() {
    BadTypeException bte = new BadTypeException("Value");
    assertEquals("Getter for Value does not match most recent setter", bte.getMessage(),
        "Custom message should return in the correct format");

  }

}
