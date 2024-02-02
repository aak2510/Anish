package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;
import static org.junit.jupiter.api.Assertions.fail;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class RevPolishCalcTest {

  private RevPolishCalc calculatorRPN;


  // Create a RevPolishCalc object before each test
  @BeforeEach
  void revPolishCreatortest() {
    calculatorRPN = new RevPolishCalc();
  }


  // Test 1 - This is a simple test to see that RevPolishCalc implements the correct Interface.
  @Test
  void interfaceImplementedTest() {
    assertTrue(Calculator.class.isAssignableFrom(RevPolishCalc.class));
  }



  // Test 2 - check that the implemented methods returns a float
  // REFACTORED: Removed OAOO code smells by making RevPolishCalc a field of this class which
  // stops
  // me from constantly writing code to create the object
  @Test
  void floatReturned() {
    try {
      assertEquals(0f, calculatorRPN.evaluate("0"), "Simple test should return 0.0");

    } catch (InvalidException e) {
      fail("No error should be thrown here");
    }
  }


  // Test 3 - If the user enters a string which is a sentence/letters it should throw the
  // InvalidException
  @Test
  void nonExpressionInput() {
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("This is a string"),
        "Should throw invalid Exception");

  }

  // Test 4 - If the user enters a string which is null or empty throw the
  // InvalidException.
  @Test
  void emptyInput() {
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate(null),
        "Should throw invalid Exception");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate(""),
        "Should throw invalid Exception");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate(" "),
        "Should throw invalid Exception");

  }

  // Test 5 - Test to see if an incorrect expression throwns an error - i.e an expression thats not
  // in normal form. To test this I can take the input and check that
  // the number of operators is = the number of operands - 1
  @Test
  void invalidExpression() {
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("35 4"),
        "Should throw invalid Exception - there are no operators");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("35 + 46 - /"),
        "Should throw invalid Exception - there are too many operators");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("3 5 + 46 - /"),
        "Should throw invalid Exception - Operators are the same as the number of Operands");
  }



  // Test 6 - For an expression to be valid, the first 2 values should always be numbers. If they
  // are not, then we need to throw an exception.
  @Test
  void correctExpression() {
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("+ 6 5"),
        "Invalid Exception - First two values are not numbers");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("- 6 5"),
        "Invalid Exception - First two values are not numbers");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("* 6 5"),
        "Invalid Exception - First two values are not numbers");
    assertThrows(InvalidException.class, () -> calculatorRPN.evaluate("/ 6 5"),
        "Invalid Exception - First two values are not numbers");
  }

  /*
   * Now we can start seeing if the calculations would work. For this we have to make use of a stack
   * to push and pop numbers from. We can do this with the use of the NumStack. So I would need to
   * interate throught the array, and if I encounter an operator I pop off two operands from the
   * stack, carry out that operation and push it back on. If I encounter an operand in the array
   * then we can simply just push it on to the stack. The final result that we return would need to
   * be popped from the stack.
   */

  /*
   * Test 7 - This test didn't pass at first because the relevant if control statements didn't exist
   * and nor did the stack. So I had to simply implemente those. However that still didn't pass as I
   * kept returning the value of 0. This is becuase I was faking for previous tests, so I changed
   * this to return the popped value of the stack.
   */
  @Test
  void additionTest() {
    try {
      assertEquals(10.0f, calculatorRPN.evaluate("5 5 +"), "Should return float value of 10");

    } catch (InvalidException e) {
      fail("Should never reach here - addition using stack failed");
    }

  }


  /*
   * Test 8 - This test had the same principle as test 7 all I had to do to pass this was to change
   * the sign to a '-' in the if statement and take away the first popped operand from the second.
   */
  @Test
  void subtractionTest() {
    try {
      assertEquals(5.0f, calculatorRPN.evaluate("10 5 -"),
          "Subtraction should return float value of 5");

    } catch (InvalidException e) {
      fail("Should never reach here - subtraction using stack failed");
    }

  }

  /*
   * Test 9 - Test to see if two numbers can be multiplied together.
   */
  @Test
  void multiplicationTest() {
    try {

      assertEquals(40.0f, calculatorRPN.evaluate("8 5 *"),
          "Mulitplication should return float value of 40");

    } catch (InvalidException e) {
      fail("Should never reach here - Multiplication using stack failed");
    }

  }

  /*
   * Test 10 - Test to see if two numbers can be Divided.
   */
  @Test
  void divisionTest() {
    try {

      assertEquals(8.0f, calculatorRPN.evaluate("40 5 /"),
          "Division should return float value of 8");

    } catch (InvalidException e) {
      fail("Should never reach here - Division using stack failed");
    }

  }


  /*
   * Test 11 - A division by zero is not possible, so we need a test to see if we can handle that
   * appropratiely
   */
  @Test
  void divisionByZeroTest() {

    try {
      assertEquals(Float.POSITIVE_INFINITY, calculatorRPN.evaluate("5 0 /"),
          "Division by 0 is not possible");
    } catch (InvalidException e) {

      e.printStackTrace();
    }



  }


  /*
   * At this point I have completed my RPN calculator but its not really that good as it can be
   * refactored to include the Symbol.java enum class I made and I can reduce the code complexity
   * and method size. I can also get "hide" of the switch statements hardcoded values throught the
   * use of the factory design pattern, further hiding the complexities of the code.
   */



  /*
   * Test 12 So first I will refactor the evaluate method so that I can check check for incorrect
   * input in a separete method. The code flows as normalas its just refactoring but I will also
   * test the indvidual values through calling the method on its own here.
   */
  @Test
  void errorCheckingMethodTest() {
    assertThrows(InvalidException.class, () -> calculatorRPN.errorChecking(" "),
        "Whitespace is not a valid expression");
    assertThrows(InvalidException.class,
        () -> calculatorRPN.errorChecking("This will return true in errorChecking()"),
        "A string is not a valid expression");
    assertThrows(InvalidException.class, () -> calculatorRPN.errorChecking("5 6 + 8 / *"),
        "Too Many operands");


  }

  /*
   * Test 13 - Now to incorporate the Symbol.java class we will first check that the operator in the
   * inputted string are within the Enum class. If they are, then we know it a valid operator and
   * use this to pop values off the stack and compute the result. To do this. we can create a
   * separate method called validOperator.
   * 
   * First we write a test to make sure that the symbol enum can be returned correctly and that it
   * the INVALID symbol. This will normally be returned if the passed throught operator (string) is
   * not in the the Symbol.java enum.
   */
  @Test
  void validOperatorInvalidTest() {
    assertEquals(Symbol.INVALID, calculatorRPN.validOperator("Any string can be passed here"),
        "This should return Symbol.PLUS");
  }


  /*
   * Test 14 - We want to make sure that this returns the actual Enum constant and not the value as
   * we will need to use this in our factory design. So we write a test to make sure it returns what
   * we want and then use TDD to implement the method.
   */
  @Test
  void validOperatorValidTest() {
    assertEquals(Symbol.PLUS, calculatorRPN.validOperator("+"), "This should return Symbol.PLUS");
    assertEquals(Symbol.MINUS, calculatorRPN.validOperator("-"), "This should return Symbol.MINUS");
    assertEquals(Symbol.TIMES, calculatorRPN.validOperator("*"), "This should return Symbol.TIMES");
    assertEquals(Symbol.DIVIDE, calculatorRPN.validOperator("/"),
        "This should return Symbol.DIVIDE");
  }


  /*
   * Test 15 - Now that we know the the validOperator method work, we need to implement this into
   * our evlauate method. We only need on test case for this, as we just checked in the previous
   * test if all operators will return the correct values. If all is well, the expression should
   * just be calculated.
   */
  @Test
  void evaluateWithValidOperatorTest() {
    assertEquals(Symbol.PLUS, calculatorRPN.validOperator("+"), "This should return Symbol.PLUS");
    try {
      assertEquals(11.0f, calculatorRPN.evaluate("5 6 +"), "This should return Symbol.PLUS");
    } catch (InvalidException e) {
      fail("Should never reach here");
    }

  }

  /*
   * Now I want to start bring the factory to life. Instead of calculating the values by hardcoding
   * the operators I will create a factory. First I need I need to implement an interface which will
   * allow me to return the "same" type of "Symbol" no matter what operator is used. These will
   * create indivdual classes which will incorportate the same method - to calculate. You cannot
   * really do TDD on an interface so I have just created one.
   * 
   * After completing the factory I now need to make sure that values are pushed onto the stack.
   * This can be done by adding a simple line into the class - numValues.push(op.calculate(operand1, operand2));
   */

  

}


