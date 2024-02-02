package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import java.util.EmptyStackException;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class NumStackTest {

  // Private field to remove OAOO smell. Just create it once as a @BeforeEach for all tests
  private NumStack numStack;


  // Create a new numStack before each test so that there a fresh testing stack for each
  // unit test
  @BeforeEach
  void setUpNumStack() {
    numStack = new NumStack();
  }

  // Test 1 - Test used to make sure that isEmpty() works.
  // REFACTORED HERE removed OAOO code smell. Kept creating a stack, so instead removed the
  // declaration here and created it in the @BeforeEach unit.
  @Test
  void isEmptyTest() {
    numStack = new NumStack();
    assertEquals(true, numStack.isEmpty(),
        "Create a new stack and verify that its empty to start off with.");
  }

  // Test 2 - Test to see if popping off an empty stack can throw an exception.
  // Didn't pass the first time, had to implement pop, and then the test for an exception to be
  // thrown which is done by using the isEmpty() method. If the value of isEmpty() returns true then
  // you already know that the size of the stack will be 0. This now passes.
  @Test
  void testEmptyStackPop() {
    assertThrows(EmptyStackException.class, () -> numStack.pop(), "Cannot pop from an empty Stack");

  }

  // Test 3 - Used to check that size returns the right value, didn't work at first because size
  // wasn't implemented but it is now.
  @Test
  void sizeTest() {
    assertEquals(0, numStack.size(),
        "Test whether the size method works by returning 0 for empty stack.");
  }


  // Test 4 - Determine whether push can add a numeric value onto the stack. Failed as there was no
  // push
  // method implemented. To fix this I added an underlying stack from Stack.java (facade behaviour
  // pattern) and implemented the push method in here.
  // This still didn't pass as isEmpty() didn't update correctly, nor did size(). To fix this I had
  // to REAFCTOR these two methods. For isEmpty() and size() I delegated this to Stack.java.
  @Test
  void testPush() {
    numStack.push(5.0f);
    assertEquals(false, numStack.isEmpty(),
        "If a value is pushed on to the stack then it should not be empty");
    assertEquals(1, numStack.size(),
        "If a value is pushed on to the stack then its size should go up accordingly");

  }


  // Test 5 - Used to check that pop returns the right value, didn't work at first because pop
  // kept returning 0.0f, i.e. wasn't updating values correctly due to previously faking. To make it
  // work I delegated the functionality of this to Stack.java. This has some error handling code
  // too, for badTypeException, which will never be reached because we are only dealing with one
  // data type - float
  @Test
  void popTest() {
    numStack.push(5.0f);
    assertEquals(5.0f, numStack.pop(), "Used to check that the right value is returned ");
  }

  // Test 6 - Popping a value and then from an empty stack should throw an exception
  @Test
  void testOverPopping() {
    numStack.push(5.0f);
    assertEquals(5.0f, numStack.pop(), "Popping a pushed item should return the Entry");
    assertThrows(EmptyStackException.class, () -> numStack.pop(), "Cannot pop from an empty Stack");
  }


  // Test 7 Push multiple numeric values to see if stack can handle no limit, then check if size()
  // and isEmpty still work with large amounts of data
  @Test
  void pushMultipleTimes() {
    for (int pushIndex = 1; pushIndex <= 100; pushIndex++) {
      numStack.push((float) pushIndex);
      assertEquals(pushIndex, numStack.size(),
          "Test to push multiple value onto the stack, and the size should go up accordingly - no Limit on stack");
      assertEquals(false, numStack.isEmpty(),
          "The isEmpty() Function should not break at anypoint");
    }

    assertEquals(100, numStack.size(), "The final value of the stack should be 5");
    assertEquals(false, numStack.isEmpty(), "The isEmpty() Function's final value should be false");
  }

  // Test 8 - removing multiple items with no issues
  @Test
  void testPopMultipleTimes() {
    for (int PushIndex = 1; PushIndex <= 5; PushIndex++) {
      numStack.push(PushIndex);
      assertEquals(PushIndex, numStack.size(),
          "Push multiple values onto the stack, and size should go up accordingly");

    }
    for (int pullIndex = 5; pullIndex >= 1; pullIndex--) {
      assertEquals(pullIndex, numStack.pop(),
          "Checking if the popped value is the correct one that is returned");

      assertEquals((pullIndex - 1), numStack.size(),
          "Popping multiple values off the stack, and size should go down accordingly");
    }


  }


  @Test // Test 9 - remove all items without knowing the size of Stack and no error should be thrown
  void testRemoveAll() {
    for (int PushIndex = 0; PushIndex < 125; PushIndex++) {
      numStack.push(PushIndex);
    }
    while (!numStack.isEmpty()) {
      numStack.pop();
    }
  }
  

}
