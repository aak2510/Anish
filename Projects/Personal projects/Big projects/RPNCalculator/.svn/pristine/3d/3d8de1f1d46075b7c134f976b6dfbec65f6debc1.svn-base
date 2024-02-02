package uk.ac.rhul.cs2800;

import java.util.ArrayList;
import java.util.EmptyStackException;
import java.util.List;

/**
 * This class represents a stack of Entry values.
 *
 * @author anish
 *
 */
public class Stack {

  // Size is used as a index reference location as well as telling us the size of stack
  private int size = 0;
  // Dynamic data structure of List is used to implement Stack and to make sure that there is no
  // limit on the size a stack can be
  private List<Entry> entries = new ArrayList<>();


  /**
   * Calculate the number of elements in this stack.
   *
   * @return the size of the stack
   */
  public int size() {
    // return the the size of the stack - how many elements in stack
    return size;
  }


  /**
   * Pushes an Entry onto the top of this stack.
   * 
   * @param entry the entry to be pushed onto the stack
   */
  public void push(Entry entry) {
    // We need to make sure that we are always pushing an item on to the top of the stack at a free
    // location. Size is used as a index reference location to the top of the stack here
    size++;
    entries.add(entry);
  }

  /**
   * Pops an Entry off the top of this Stack.
   *
   * @return the Entry on the top of the stack
   * @throws EmptyStackException if this stack is empty
   */
  public Entry pop() {
    // If there is nothing on the stack then an exception is thrown
    if (size == 0) {
      throw new EmptyStackException();
    }
    // When we pushed, we added 1 to the size, so now that we are popping we need to - 1 from the
    // size to reference the right location of an entry in the stack. THIS DOES NOT REMOVE FROM THE
    // STACK.
    Entry topOfList = entries.get(size - 1);
    // Because we are popping an item, we need to remove it from the stack, i.e. remove it from the
    // list
    entries.remove(size - 1);
    // Then we update size to reference the new top of the stack
    size--;
    return topOfList;
  }

  /**
   * Looks at the Entry on the top of this stack without removing it from the stack.
   *
   * @return newest entry
   * @throws EmptyStackException if this stack is empty
   */
  public Entry top() {
    // If the stack has nothing on it, then we can't see the top. So an exception is thrown
    if (size == 0) {
      throw new EmptyStackException();
    }
    // If there is an item, we change the size to reference the right location on the top of the
    // stack and we return this item. THIS DOES NOT REMOVE AN ITEM FROM THE STACK
    return entries.get(size - 1);
  }



}
