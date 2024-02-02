package uk.ac.rhul.cs2800;

/**
 * Enums of non-number tokens possible in an expression.
 *
 * @author anish
 *
 */
public enum Symbol {
  /** Syntax for invoking constuctor with value "(".*/
  LEFT_BRACKET("("),
  /** Call constructor with value ")". */
  RIGHT_BRACKET(")"),
  /** Call constructor with value "*". */
  TIMES("*"),
  /** Call constructor with value "/". */
  DIVIDE("/"),
  /** Call constructor with value "+". */
  PLUS("+"),
  /** Call constructor with value "-". */
  MINUS("-"),
  /** Call constructor with value "!". */
  INVALID("!");

  /**
   * The textual represenation of a Symbol.
   */
  private final String string;

  /**
   * Class contructor setting the string field of the enum.
   *
   * @param string the string to be assigned to the string field
   */
  private Symbol(String string) {
    this.string = string;

  }

  /**
   * Provide a textual representation of a Symbol.
   *
   * @return string represenation of enum instance
   */
  @Override
  public String toString() {
    return this.string;
  }

}
