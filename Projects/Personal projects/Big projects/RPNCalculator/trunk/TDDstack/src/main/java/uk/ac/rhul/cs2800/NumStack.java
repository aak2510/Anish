package uk.ac.rhul.cs2800;

import java.util.EmptyStackException;

/**
 * A facade providing a simplified stack of numeric values.
 * 
 * @author anish
 *
 */
public class NumStack {


  /**
   * Underlying Stack implementation which allows for facade design pattern.
   */
  private Stack numStack = new Stack();


  /**
   * Delegated to contained Stack of Entries.
   * 
   * @return true if the Stack is empty, false otherwise
   */
  public boolean isEmpty() {
    // If the size of the stack is 0, then the stack is empty
    return numStack.size() == 0;

  }


  /**
   * Pop is delegated to the contained Stack of entries.
   *
   * @return the number at the top of the stack
   * @throws EmptyStackException if this stack is empty
   */
  public float pop() {
    // delegate to Stack.java
    // If there is nothing on the stack then an exception is thrown
    if (isEmpty() == true) {
      throw new EmptyStackException();
    }

    try {
      return numStack.pop().getValue();
    } catch (BadTypeException e) {
      // Can never actually reach here as its a facade for stack and only deals with numbers so we
      // just return something random
      return Float.POSITIVE_INFINITY;
    }
  }


  /**
   * Delegated to the Stack of entries.
   *
   * @return the size of the stack
   */
  public Integer size() {
    // Check the number of Entries on the stack
    return numStack.size();
  }


  /**
   * Push gets delegated to the contained Stack of entries.
   *
   * @param i the number to be pushed on to the top of the stack
   */
  public void push(float i) {
    // Create a new entry and push it on to the underlying stack
    numStack.push(new Entry(i));

  }



}
