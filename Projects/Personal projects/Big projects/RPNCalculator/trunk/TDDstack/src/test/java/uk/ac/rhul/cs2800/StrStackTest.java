package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import java.util.EmptyStackException;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class StrStackTest {

  private StrStack strStack;
  private String infixExpression = "( 5 * ( 6 + 7 ) ) - 2";
  private String postfixExpression = "5 6 7 + * 2 -";

  @BeforeEach
  void testStackCreation() {
    strStack = new StrStack();
  }

  // Test 1 - Determine whether the size method works, Didn't work at first, had to create a size()
  // in StrStack.
  @Test
  void sizeTest() {
    strStack = new StrStack();
    assertEquals(0, strStack.size(), "Create a new stack and verify that the starting size is 0");
  }

  // Test 2 - Test used to make sure that isEmpty() works. There was no isEmpty() so it failed.
  // To make it work I had to implement the isEmpty() in the StrStack class.
  @Test
  void isEmptyTest() {
    strStack = new StrStack();
    assertEquals(true, strStack.isEmpty(),
        "Create a new stack and verify that its empty to start off with.");
  }

  // Test 3 - Test to see if popping off an empty stack can throw an exception, had to
  // implement pop() for it to pass and throw a new EmptyStackException
  @Test
  void testEmptyStackPop() {
    assertThrows(EmptyStackException.class, () -> strStack.pop(), "Cannot pop from an empty Stack");
  }

  // Test 4 - determine whether push can add a string onto the stack - To pass this I had to
  // implement push Which then changed size to 1.
  @Test
  void testPush() {
    assertEquals(true, strStack.isEmpty(),
        "The stack should have nothing on it after it has been created");

    strStack.push("25");

    assertEquals(1, strStack.size(),
        "Test to push an entry of type Symbol onto the stack and increase size");

    assertEquals(false, strStack.isEmpty(),
        "isEmpty should return false as we have just pushed an item onto the stack and the size has increased");

  }

  // Test 5 - Used to check that pop returns the right string, didn't work at first because pop
  // kept returning null, i.e. wasn't updating values correctly due to previously faking. To make it
  // work I delegated the functionality of this to Stack.java. This has some error handling code
  // too, for badTypeException, which will never be reached because we are only dealing with one
  // data type - float
  @Test
  void popTest() {
    strStack.push(infixExpression);
    assertEquals(infixExpression, strStack.pop(),
        "Used to check that the right string is returned ");
  }

  // Test 6 - Popping a string and then from an empty stack should throw an exception
  @Test
  void testOverPopping() {
    strStack.push(infixExpression);
    assertEquals(infixExpression, strStack.pop(), "Popping a pushed item should return the Entry");
    assertThrows(EmptyStackException.class, () -> strStack.pop(), "Cannot pop from an empty Stack");
  }

  // Test 7 Push multiple string expressions to see if stack can handle no limit, then check if
  // size()
  // and isEmpty still work with large amounts of data
  @Test
  void pushMultipleTimes() {
    for (int pushIndex = 1; pushIndex <= 100; pushIndex++) {
      strStack.push(postfixExpression);
      assertEquals(pushIndex, strStack.size(),
          "Test to push multiple value onto the stack, and the size should go up accordingly - no Limit on stack");
      assertEquals(false, strStack.isEmpty(),
          "The isEmpty() Function should not break at anypoint");
    }

    assertEquals(100, strStack.size(), "The final value of the stack should be 5");
    assertEquals(false, strStack.isEmpty(), "The isEmpty() Function's final value should be false");
  }


  /*
   * Test 8 - I need to have a method which looks at the top of the stack without popping it off.
   * This is the peek() of a stack
   */
  @Test
  void topTest() {
    strStack.push(postfixExpression);
    assertEquals(postfixExpression, strStack.top(),
        "Pushing an item and then viewing the top should have the same 'expression'");
    assertEquals(1, strStack.size(),
        "If we are just viewing the top, then nothing should be removed");
  }

}


