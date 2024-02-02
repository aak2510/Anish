package uk.ac.rhul.cs2800;

/**
 * This is a custom exception which is derived from (Extends) the Exception class. It is thrown if
 * the user enters an expression which is not of the right type or is incorrectly formulated. A
 * String error message is then taken and passed through to the parent constructor.
 * 
 * @author anish
 */
public class InvalidException extends Exception {

  /**
   * Deserialization uses this number to ensure that a loaded class corresponds exactly to a
   * serialized object.
   */
  private static final long serialVersionUID = 1L;



  /**
   * A constructor that takes a String as the error message and calls the parent class constructor.
   *
   * @param string a custom string message explaining the error
   */
  public InvalidException(String string) {
    // Calling the constructor of parent Exception
    super("Invalid Exception: " + string);
  }

}
