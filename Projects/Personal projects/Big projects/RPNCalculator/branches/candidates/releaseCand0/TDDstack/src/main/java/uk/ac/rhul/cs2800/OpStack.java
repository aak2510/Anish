package uk.ac.rhul.cs2800;

import java.util.EmptyStackException;

/**
 * A facade providing a simplified stack of Symbol values.
 *
 * @author anish
 *
 */
public class OpStack {

  /**
   * Underlying Stack implementation which allows for facade design pattern.
   */
  private Stack opStack = new Stack();


  /**
   * Delegated to the Stack of entries.
   *
   * @return the size of the stack
   */
  public int size() {
    // Check the number of Entries on the stack
    return opStack.size();
  }


  /**
   * Delegated to contained Stack of Entries.
   * 
   * @return true if the Stack is empty, false otherwise
   */
  public boolean isEmpty() {
    // If the size of the stack is 0, then the stack is empty
    return opStack.size() == 0;

  }


  /**
   * Pop is delegated to the contained Stack of entries.
   *
   * @return the Symbol at the top of the stack
   * @throws EmptyStackException if this stack is empty
   */
  public Symbol pop() {
    // delegate to Stack.java
    // If there is nothing on the stack then an exception is thrown
    if (isEmpty() == true) {
      throw new EmptyStackException();
    }

    try {
      return opStack.pop().getSymbol();
    } catch (BadTypeException e) {
      // Can never actually reach here as its a facade for stack and only deals with numbers so we
      // just return something random
      return Symbol.INVALID;
    }
  }


  /**
   * Push gets delegated to the contained Stack of entries.
   *
   * @param i the Symbol to be pushed on to the top of the stack
   */
  public void push(Symbol i) {
    // Create a new entry and push it on to the underlying stack
    opStack.push(new Entry(i));

  }


  /**
   * Top gets delegated to the contained Stack of entries.
   *
   * @return the Symbol at the top of the stack, without removing it
   */
  public Symbol top() {

    try {
      return opStack.top().getSymbol();

    } catch (BadTypeException e) {
      /* Can never reach here as we are only dealing with symbol objects */
      return Symbol.INVALID;

    }

  }

}
