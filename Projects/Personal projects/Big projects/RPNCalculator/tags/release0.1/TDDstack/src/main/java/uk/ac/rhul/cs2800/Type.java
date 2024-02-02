package uk.ac.rhul.cs2800;


/**
 * Enums representing the types of value an Entry can represent.
 *
 * @author anish
 *
 */
public enum Type {
  /** Syntax for invoking constuctor with value "Number". */
  NUMBER("Number"),
  /** Calls constuctor with value "String". */
  STRING("String"),
  /** Calls constuctor with value "Symbol". */
  SYMBOL("Symbol"),
  /** Calls constuctor with value "Invalid". */
  INVALID("Invalid");


  /**
   * The textual represenation of an enum.
   */
  private String stringPrintable;

  /**
   * Class contructor setting the string field of the enum.
   *
   * @param stringPrintable value to be assigned to string field
   */
  private Type(String stringPrintable) {
    // sets the string field
    this.stringPrintable = stringPrintable;
  }


  /**
   * Provide a textual representation of an enum.
   *
   * @return string represenation of enum instance
   */
  @Override
  public String toString() {
    return this.stringPrintable;
  }

}
