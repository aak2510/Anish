package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertTrue;
import static org.junit.jupiter.api.Assertions.fail;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class StandardCalcTest {

  private StandardCalc standardCalc;

  @BeforeEach
  void createObject() {
    standardCalc = new StandardCalc();
  }

  /*
   * Test 1 - The first test I need to write is to make sure I can create an object of
   * StandardCalc.java which implements the Calculator Interface.
   */
  @Test
  void standardCalcObjTest() {
    assertTrue(Calculator.class.isAssignableFrom(StandardCalc.class));
  }


  /*
   * Test 2 - Since the Shunting Yard algorithm implementes precedence of order for operators, we
   * need to be sure that each operator returns a specific precedence level. This can be done using
   * a if statements and switch statements.
   * 
   * To pass this test I had to implement a 2 if statements which associcated values with the
   * different operators depending upon their precendece level. I first created this in the evaluate
   * method, which set a field to a certain number depending upon the operator. But after passing
   * the tests I decided to refactor this and implement a separate method for it. I then updated the
   * assertEquals clauses to make sure it calls the right methods to test
   */
  @Test
  void precedenceTest() {
    assertEquals(1, standardCalc.getPrecedenceLevel("+"),
        "This should return a precedence level of 1");
    assertEquals(1, standardCalc.getPrecedenceLevel("-"),
        "This should return a precedence level of 1");
    assertEquals(2, standardCalc.getPrecedenceLevel("*"),
        "This should return a precedence level of 1");
    assertEquals(2, standardCalc.getPrecedenceLevel("/"),
        "This should return a precedence level of 1");

  }


  /*
   * Refactored Here. Removed OAOO code smells by creating @BeforeEach tag to construct object of
   * StandardCalc instead of creating one for each test by hand
   */


  /*
   * Test 3 - Now we need to check that the input from the user would be correct. This means that we
   * need to check that the user has entered a valid infix expression. For this we need to check 2
   * things. 1. If the character is an operand 2. If the number of brackets are equal i.e. "( 3 + 5"
   * is invalid as theres no close bracket [")"] First thing to test for is the brackets. Which is
   * what this test does.
   * 
   * To pass this test I first intitialised 2 variables which act as counters to count the number of
   * "(" and ")". I then did a check to see if they were equal. If they weren't then I originally
   * recalled the calculate function. However I realised that this wouldn't be the correct thing to
   * do as the UML is still to be completed. So I then extracted this into a method of its own which
   * will return true if the number of brackets are equal and false otherwise.
   */
  @Test
  void bracketsTest() {
    assertEquals(true, standardCalc.bracketsChecker("( )"), "This should return true");
    assertEquals(true, standardCalc.bracketsChecker("3 + 5"), "This should return true");
    assertEquals(false, standardCalc.bracketsChecker("( 3 + 5"), "This should return false");
    assertEquals(false, standardCalc.bracketsChecker("3 + 5 )"), "This should return false");
    assertEquals(true, standardCalc.bracketsChecker("( 3 + 5 )"), "This should return false");
  }

  /*
   * Test 4 - Now I that I have tested that the number of brackets are the same, I need to check
   * that the expression passed through is valid expression or not (A valid expression only has
   * numbers and operators and no letters). First we need to check for inccorect empty expressions
   */

  @Test
  void expressionTester() throws InvalidException {
    assertEquals(false, standardCalc.expressionChecker("This is not an expression"),
        "This should return false, as its not an expression");
    assertEquals(false, standardCalc.expressionChecker(" "),
        "This should return false, as its not an expression");
    assertEquals(false, standardCalc.expressionChecker(""),
        "This should return false, as its not an expression");


  }

  // Test 5 - Now I need to make sure that the expression entered is valid
  @Test
  void expressionValidTester() throws InvalidException {
    assertEquals(true, standardCalc.expressionChecker("-5 + 6"),
        "This should return true, as it is an expression");
    assertEquals(true, standardCalc.expressionChecker("5 + 6"),
        "This should return true, as it is an expression");
    assertEquals(false, standardCalc.expressionChecker("5 6"),
        "This should return true, as it is an expression");
    assertEquals(true, standardCalc.expressionChecker("( 5 + 6 )"),
        "This should return true, as it is an expression");

  }


  /*
   * No we can start to implement the shunting yard algorithm. We finshed setting up the precedence
   * order in test 2 so we can just use this in the algorithm when deciding what operation to carry
   * out.
   */

  /*
   * Test 6 I am now going to implement the shuntingYard algorithm. First I am going to start of
   * with the basics, in that I am going to just iterate through the expression and anytime I come
   * across an operator I will push it on to the opStack and the operands will be added to the
   * output String. I will then return the output of this string expression and test if this whole
   * process worked.
   * 
   * To pass this test, I implemented another method called ShuntingYard() and operatorSymbol(). To
   * pass this test I had to split the string at all whitespaces. I then had to iterate throught the
   * array and each time whilst checking if the current index of the array was an operand or
   * operator. If it was an operand then I simply appened the item on to the end of a string. For
   * operators I had to get the symbol value for that operator (using operatorSymbol) and push it on
   * to the opStack. When I've iterated throught the array, I popped off the operator from the stack
   * and appended it to the the string.
   */

  @Test
  void simpleExpressionEvaluatorTest() {
    assertEquals("5 3 +", standardCalc.shuntingYard("5 + 3"),
        "This should show that the output from the passed through arguement is 5 and 3");
    assertEquals("5 3 -", standardCalc.shuntingYard("5 - 3"),
        "This should show that the output from the passed through arguement is 5 and 3");
    assertEquals("5 3 *", standardCalc.shuntingYard("5 * 3"),
        "This should show that the output from the passed through arguement is 5 and 3");
    assertEquals("5 3 /", standardCalc.shuntingYard("5 / 3"),
        "This should show that the output from the passed through arguement is 5 and 3");
  }



  /*
   * Test 7 - Now that we know that the conversion works for smaller expressions, we need to
   * implement something for bigger expressions. Here we need to be able to compare the current
   * operator to the one at the top of the OpStack and depending upon the precedence we either pop
   * or push the operator.
   */
  @Test
  void precedenceAndMultipleExpressionTest() {
    assertEquals("5 3 + 6 8 * 11 / +", standardCalc.shuntingYard("5 + 3 + 6 * 8 / 11"),
        "This should convert the expression with bracket into postfix");

  }


  /*
   * Test 8 - Now that we can handle larger expressions we need to make sure we can handle brackets
   * as well. In RPN we don't have brackets however they allow us to determin the order in which we
   * compute an expressions. In this test case we need to make sure we can convert an expression to
   * postfix which has brackets. To pass this test I had to incorporate a simple else if statement
   * into the middle of the for loop that I had already created. I tried to add this to the end but
   * it failed as it wouldn't check for the close brackets properly. I also had to make sure that
   * then string had whitespace at the end after something was added and then trim the last
   * whitespace when returning the final expression.
   */

  @Test
  void expressionWithBrackets() {
    assertEquals("5 3 + 6 8 * 11 / + 25 -",
        standardCalc.shuntingYard("5 + 3 + ( 6 * 8 ) / 11 - 25"),
        "This should convert the expression with bracket into postfix");
  }

  /*
   * Test 9 - Now that we have an expression in postfix, we can evaluate this by passing the string
   * to the evaluate method which then passes the string to RevPolishCalc which can compute the
   * final output for me. This returned an error due to some round errors. By default Java returns
   * the answer to 6 significant figures so we will leave it at that to allow for accurate
   * precision. Therefore casting the assert Equals "expected" arguement as a float, will
   * automatically round it to 6s.f. and using floats in the actualy calculations will also do this
   */
  @Test
  void evaluateExpression() {
    try {
      assertEquals((Float.valueOf("-12.6363636")),
          standardCalc.evaluate("5 + 3 + ( 6 * 8 ) / 11 - 25"),
          "The result of the expression should be returned");

      assertEquals((Float.valueOf("28.6363636")),
          standardCalc.evaluate("5 + 3 + ( 6 * -8 ) / 11 - -25"),
          "The result of the expression should be returned");

    } catch (InvalidException e) {
      fail("Should never reach here" + e);
    }
  }


}
