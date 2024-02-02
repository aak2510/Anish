package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import java.util.EmptyStackException;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class OpStackTest {

  // Private fields to remove OAOO smell. Just create it once as a @BeforeEach for all tests
  private OpStack opStack;
  private Symbol leftBracketSymbol;
  private Symbol rightBracketSymbol;

  // Before each so that there a fresh testing stack for each unit test
  @BeforeEach
  void createOpStack() {
    opStack = new OpStack();
    leftBracketSymbol = Symbol.LEFT_BRACKET;
    rightBracketSymbol = Symbol.RIGHT_BRACKET;
  }


  // Test 1 - Determine whether the size method works, Didn't work at first, had to create a size()
  // in OpStack REFACTORED: Remove OAOO smell. Now I create a stack using @BeforeEach so that I
  // don't have duplicated code
  @Test
  void sizeTest() {
    assertEquals(0, opStack.size(), "Create a new stack and verify that the starting size is 0");
  }

  // Test 2 - Test used to make sure that isEmpty() works. There was no isEmpty() so it failed.
  // To make it work I had to implement the isEmpty() in the OpStack class.
  @Test
  void isEmptyTest() {
    assertEquals(true, opStack.isEmpty(),
        "Create a new stack and verify that its empty to start off with.");
  }

  // Test 3 - Test to see if popping off an empty stack can throw an exception, had to
  // implement pop() for it to pass and throw a new EmptyStackException
  @Test
  void testEmptyStackPop() {
    assertThrows(EmptyStackException.class, () -> opStack.pop(), "Cannot pop from an empty Stack");
  }

  // Test 4 - determine whether push can add a Symbol onto the stack - To pass this I had to
  // implement push Which then changed size to 1.
  @Test
  void testPush() {
    opStack.push(Symbol.valueOf("LEFT_BRACKET"));
    assertEquals(1, opStack.size(),
        "Test to push an entry of type Symbol onto the stack and increase size");
  }

  // Test 5 - Used to check that we push and then pop the right Symbol onto the stack. This failed
  // at first as pop was orginally returning a fake value, size was increasing properly and
  // isEmpty() hadn't been updating correctly
  @Test
  void testPushAndPop() {
    assertEquals(true, opStack.isEmpty(),
        "The stack should have nothing on it after it has been created");
    opStack.push(leftBracketSymbol);

    assertEquals(false, opStack.isEmpty(),
        "Should return false we have just pushed an item onto it");

    assertEquals(Symbol.valueOf("LEFT_BRACKET"), opStack.pop(),
        "Popping a pushed item should return the correct Symbol");

    assertEquals(0, opStack.size(), "The final size of the stack should be 0 after popping");
    assertEquals(true, opStack.isEmpty(), "We have popped everything off of the stack");
  }


  // Test 6 Push 2 items to and pop the same two items. Failed as there was nothing keeping
  // track of multiple items being pushed. Instead of creating a whole new stack we can
  // delegate functionality to Stack.java - This means the entire code base changes makes
  // everything more simple
  @Test
  void testDoublePush() {
    opStack.push(leftBracketSymbol);
    opStack.push(rightBracketSymbol);
    assertEquals(Symbol.valueOf("RIGHT_BRACKET"), opStack.pop(),
        "Popping a pushed item should return the correct Symbol");

    assertEquals(Symbol.valueOf("LEFT_BRACKET"), opStack.pop(),
        "Popping a pushed item should return the correct Symbol");

    assertEquals(0, opStack.size(), "There should be no items left on the stack");
    assertEquals(true, opStack.isEmpty(), "IsEmpty() should return true and stack size = 0");


  }


  // Test 7 - Popping an item and then from an empty stack should throw an exception
  @Test
  void testOverPopping() {
    opStack.push(leftBracketSymbol);
    assertEquals(leftBracketSymbol, opStack.pop(), "Popping a pushed item should return the Entry");
    assertThrows(EmptyStackException.class, () -> opStack.pop(), "Cannot pop from an empty Stack");
  }



  // Test 8 Push multiple Symbols to see if stack can handle no limit, then check if size()
  // and isEmpty still work with large amounts of data
  @Test
  void pushMultipleTimes() {
    for (int pushIndex = 1; pushIndex <= 100; pushIndex++) {
      opStack.push(leftBracketSymbol);
      assertEquals(pushIndex, opStack.size(),
          "Test to push multiple value onto the stack, the size should go up accordingly - no Limit on stack");
      assertEquals(false, opStack.isEmpty(), "The isEmpty() Function should not break at anypoint");
    }

  }



  // Test 9 - removing multiple items with no issue
  @Test
  void testPopMultipleTimes() {
    for (int PushIndex = 1; PushIndex <= 100; PushIndex++) {
      opStack.push(leftBracketSymbol);
      assertEquals(PushIndex, opStack.size(),
          "Push multiple values onto the stack, and size (100) should go up accordingly");
    }
    for (int pullIndex = 100; pullIndex >= 1; pullIndex--) {
      opStack.pop();
      assertEquals((pullIndex - 1), opStack.size(),
          "Popping multiple values off the stack, and size should go down accordingly");
    }

    assertEquals(true, opStack.isEmpty(),
        "Popping multiple values off the stack, and size should go down accordingly");

  }

  @Test // Test 10 - remove all items without knowing the size of Stack and no error should be thrown
  void testRemoveAll() {
    
    for (int PushIndex = 0; PushIndex < 125; PushIndex++) {
      opStack.push(leftBracketSymbol);
      opStack.push(rightBracketSymbol);
    }
    assertEquals(250, opStack.size(), "There should be 250 elements on the stack");
    while (!opStack.isEmpty()) {
      opStack.pop();
    }
  }
  
  @Test // Test 11 - Check that an empty peek returns an exception
  void testEmptyStackTop() {
    assertThrows(EmptyStackException.class, () -> opStack.top(),
        "Cannot view top of stack in an empty Stack");
  }

}
