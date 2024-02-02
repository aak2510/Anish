package uk.ac.rhul.cs2800;

import java.util.EmptyStackException;

/**
 * A facade providing a simplified stack of Strings.
 *
 * @author anish
 *
 */
public class StrStack {

  /**
   * Underlying Stack implementation which allows for facade design pattern.
   */
  private Stack strStack = new Stack();

  /**
   * Delegated to the Stack of entries.
   *
   * @return the size of the stack
   */
  public int size() {

    return strStack.size();
  }

  /**
   * Delegated to contained Stack of Entries.
   * 
   * @return true if the Stack is empty, false otherwise
   */
  public boolean isEmpty() {
    return strStack.size() == 0;
  }

  /**
   * Pop is delegated to the contained Stack of entries.
   *
   * @return the String value at the top of the stack
   * @throws EmptyStackException if this stack is empty
   */
  public String pop() {
    if (size() == 0) {
      throw new EmptyStackException();
    }

    try {
      return strStack.pop().getString();
    } catch (BadTypeException e) {
      // Can never actually reach here as its a facade for stack and only deals with strings so we
      // just return something random
      return null;
    }
  }

  /**
   * Push gets delegated to the contained Stack of entries.
   *
   * @param string the String value to be pushed on to the top of the stack
   */
  public void push(String string) {
    strStack.push(new Entry(string));


  }

  /**
   * Top gets delegated to the contained Stack of entries.
   *
   * @return the String at the top of the stack, without removing it
   */
  public String top() {
    try {
      return strStack.top().getString();

    } catch (BadTypeException e) {
      /* Can never reach here as we are only dealing with symbol objects */
      return "INVALID";

    }
  }

}


