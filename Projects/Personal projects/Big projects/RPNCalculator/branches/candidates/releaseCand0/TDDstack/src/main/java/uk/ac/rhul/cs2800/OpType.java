package uk.ac.rhul.cs2800;

/**
 * The different types of calculations that can be performed.
 *
 * @author anish
 *
 */
public enum OpType {


  /**
   * Another term of normal expressions - this takes the form A * (B + C).
   */
  INFIX,
  
  /**
   * Another term for Reverse Polish Notation - An example of this would be ABC+/.
   */
  POSTFIX;

 

}
