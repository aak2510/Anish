package uk.ac.rhul.cs2800;

/**
 * This is a custom exception which is derived from (extends) the exception class. It is thrown when
 * the user trys to call upon an objects field whose values are updated and are now null or Invalid.
 * A String error message is then taken and passed through to the parent constructor.
 * 
 * @author anish
 *
 */
public class BadTypeException extends Exception {


  // Deserialization uses this number to ensure that a loaded class corresponds exactly to a
  // serialized object
  private static final long serialVersionUID = 902259016746188985L;

  /**
   * A constructor that takes a String as the error message and calls the parent class constructor.
   *
   * @param str a custom string message explaining the error
   */
  public BadTypeException(String str) {
    // Calling the constructor of parent Exception
    super("Getter for " + str + " does not match most recent setter");
  }



}
