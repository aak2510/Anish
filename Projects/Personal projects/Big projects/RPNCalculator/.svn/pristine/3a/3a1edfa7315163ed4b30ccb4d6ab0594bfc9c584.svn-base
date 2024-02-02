package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class CalcModelTest {
  private CalcModel calculator;
  private boolean revPolish = false;
  private boolean standardCalc = true;
  
  
  
  // First we need to create a CalcModel instance
  @BeforeEach
  void createCalcModel() {
    calculator = new CalcModel();
  }

  /*
   * I now need to implement a method which will need to take two parameters. The first one is the
   * string exrpession and the second one is a boolean which determines if the expression entered
   * was in infix or postfix notations. If the boolean is false, then it means that the expression
   * is post fix and the string will be passed as an arguement to the RevPolishCalc method.
   * 
   * REFACTORED created a before each to create a new CalcModel object before each test.
   */

  // Test 1 - Implement a method which has two parameters
  @Test
  void evaluateTest() {
    assertEquals(0f, calculator.evaluate("0", revPolish),
        "This method should simply return 0 to start off with");
  }


  /*
   * Test 2 - I now need to test to make sure that if a user enters an infix expression that it is
   * correctly calculated and the result is output to the terminal
   */
  @Test
  void infixExpression() {
    assertEquals(63f, calculator.evaluate("( 5 * ( 6 + 7 ) ) - 2", standardCalc),
        "This should return the result 63.0");

  }

  /*
   * Test 3 - I now need to test to make sure that if a user enters an RPN expression that it is
   * correctly calculated and the result is output to the terminal
   */
  @Test
  void rpnExpression() {
    assertEquals(63f, calculator.evaluate("5 6 7 + * 2 -", revPolish),
        "This should return the result 63.0");

  }

  /* Now I need to test for extrenous cases. In other words for errenous cases. */


  /*
   * Test 4 - If a user enters an infix expression and sets the boolean variable to false - in other
   * words says that an infix expression is in RPN, this should throw an InvalidException, which is
   * thrown and caught by the same classes. So we need to make sure that these errors are reported
   * appropraitely. It first this was failing because there wasn't a necessary check for to see if
   * it was an infix expression. So first I had to implement this.
   */
  @Test
  void invalidPostfixExpression() throws InvalidException {
    assertEquals(Float.POSITIVE_INFINITY, calculator.evaluate("5 + 6", revPolish),
        "This should return the result postive infinity and print to the err stream");
    assertEquals(Float.POSITIVE_INFINITY, calculator.evaluate("( 5 * ( 6 + 7 ) ) - 2", revPolish),
        "This should return the result postive infinity and print to the err stream");

  }


  /*
   * Test 5 - Now we need to check the reverse of test 4 i.e. an invalid infix expression. In this
   * case, a infix expression is valid if we can produce a postfix notation an get a result
   */
  @Test
  void invalidInfixExpression() throws InvalidException {
    assertEquals(11f, calculator.evaluate("5 6 +", standardCalc),
        "This should return the result postive infinity and print to the err stream");
    assertEquals(-15f, calculator.evaluate("5 6 7 + * 2 -", standardCalc),
        "This should return the result postive infinity and print to the err stream");

  }

  /*
   * Test 6 - One of the requirements is to show the values of each of the calculators memories.
   * This comes into play when I implement the function to allow users to go back to previous
   * expressions using the up arrow. Which will be a part of the controller. However for now we will
   * do a TDD to "Re-create" the strStack to store the values of each of the calculators. For now we
   * will just store them onto the stack, but to retrieve them we will implement at a later stage.
   */

  @Test
  void strStackStoreTest() {
    assertEquals(63f, calculator.evaluate("5 6 7 + * 2 -", revPolish),
        "This should return the result 63");
    assertEquals(60f, calculator.evaluate("( 5 * ( 6 + 7 ) ) - 5", standardCalc),
        "This should return the result 60");
    
    // Uncomment this and change visibility of fields to default.
    //assertEquals(String.valueOf(63f), calculator.revPolishStrStack.top(), "This should return the result 63");
    //assertEquals(String.valueOf(60f), calculator.StandardStrStack.top(), "This should return the result 60");
    

  }

}
