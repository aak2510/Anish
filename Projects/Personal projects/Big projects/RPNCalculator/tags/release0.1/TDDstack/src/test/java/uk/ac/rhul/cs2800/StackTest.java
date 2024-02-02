package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.fail;
import java.util.EmptyStackException;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class StackTest {

  // Private fields to remove OAOO smell. Just create it once as a @BeforeEach for all tests
  private Stack newStack;
  private Entry newEntry;


  @BeforeEach // Before each so that there a fresh testing stack for each unit test
  void setupEntry() {
    newStack = new Stack();
    newEntry = new Entry(0f);
  }


  // Tests for all Methods of stack

  @Test // Test 1 - determine whether the size method works
  void testSize() {
    assertEquals(0, newStack.size(), "Create a new stack and verify that the starting size is 0");
  }

  @Test // Test 2 - determine whether push can add an item onto the stack
  void testPush() {
    newStack.push(newEntry);
    assertEquals(1, newStack.size(), "Test to push an entry onto the stack and increase size");
  }

  @Test // Test 3 - Test to see if popping off an empty stack can throw an exception - REFACTORED
        // HERE TO REMOVE OAOO SMELL. Kept creating a stack for each test
  void testEmptyStackPop() {
    assertThrows(EmptyStackException.class, () -> newStack.pop(), "Cannot pop from an empty Stack");
  }

  @Test // Test 4 - pushing and then popping an item should return the item just pushed
  void testPushAndPop() {
    newStack.push(newEntry);
    assertEquals(newEntry, newStack.pop(), "Popping a pushed item should return the Entry");
  }

  @Test // Test 5 - Popping an item and then from an empty stack should throw an exception
        // REFACTORED HERE TO REMOVE OAOO SMELL. Kept creating a new Entry object so just made a set
        // up for it instead. Here the entry clas was made with an empty constructor.
  void testOverPopping() {
    newStack.push(newEntry);
    assertEquals(newEntry, newStack.pop(), "Popping a pushed item should return the Entry");
    assertThrows(EmptyStackException.class, () -> newStack.pop(), "Cannot pop from an empty Stack");
  }

  @Test // Test 6 Push multiple items to see if stack can handle no limit
  void pushMultipleTimes() {
    for (int PushIndex = 1; PushIndex <= 100; PushIndex++) {
      newStack.push(newEntry);
      assertEquals(PushIndex, newStack.size(),
          "Test to push multiple value onto the stack, and the size should go up accordingly - no Limit on stack");

    }
    assertEquals(100, newStack.size(), "The final value of the stack should be 5");
  }

  @Test // Test 7 - removing multiple items with no issue
  void testPopMultipleTimes() {
    for (int PushIndex = 1; PushIndex <= 5; PushIndex++) {
      newStack.push(newEntry);
      assertEquals(PushIndex, newStack.size(),
          "Push multiple values onto the stack, and size should go up accordingly");
    }
    for (int pullIndex = 5; pullIndex >= 1; pullIndex--) {
      newStack.pop();
      assertEquals((pullIndex - 1), newStack.size(),
          "Popping multiple values off the stack, and size should go down accordingly");
    }

  }

  @Test // Test 8 - remove all items without knowing the size of Stack and no error should be thrown
  void testRemoveAll() {
    for (int PushIndex = 0; PushIndex < 125; PushIndex++) {
      newStack.push(newEntry);
    }
    while (newStack.size() != 0) {
      newStack.pop();
    }
  }

  @Test // Test 9
  void testEmptyStackTop() {
    assertThrows(EmptyStackException.class, () -> newStack.top(),
        "Cannot view top of stack in an empty Stack");
  }

  @Test // Test 10 - Check to see that top returns the top of the stack. REFACTORED Updated newEntry
        // object with a value to check values in this test work and to allow it to pass. This
        // shouldnt effect previous tests as all tests passed before hand. (And rightly so it
        // didn't)
  void testTop() {
    newStack.push(newEntry);
    assertEquals(newEntry, newStack.top(),
        "Pushing an item and then viewing the top should have the same 'values'");
  }

  @Test // Test 11 - In the previous test we can see that top returns an the top of the stack. Here
        // we need to make sure that it DOES NOT REMOVE the top of the stack.
  void testTopNoRemoval() {

    try {
      newStack.push(newEntry);
      assertEquals(newEntry.getValue(), newStack.top().getValue(),
          "Pushing an item and then viewing the top should have the same 'values'");
      assertEquals(1, newStack.size(),
          "After calling top, the entry should not be removed and hence the size should remain the same");
    } catch (BadTypeException e) {
      fail("Nothing should reach here - Error with Entry getters and/or Exception class");
    }

  }


}
