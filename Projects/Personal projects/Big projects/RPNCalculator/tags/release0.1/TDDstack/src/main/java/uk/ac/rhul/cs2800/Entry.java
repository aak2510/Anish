package uk.ac.rhul.cs2800;

import java.util.Objects;

/**
 * This class represents the values stored in a stack.
 *
 * @author anish
 *
 */
public class Entry {

  private float number;
  private String str;
  private Symbol other;
  private Type type;


  /**
   * Creates an instance of Entry with a float value and sets its type to NUMBER.
   *
   * @param value this Entry's float value assigned to the number field
   */
  public Entry(float value) {
    // Sets the number and type fields to value and Type.NUMBER, respectively
    this.number = value;
    this.type = Type.NUMBER;
  }


  /**
   * Creates an instance Entry with a String and sets its type to STRING.
   *
   * @param string this Entry's string value assigned to the string field
   */
  public Entry(String string) {
    // Sets the str and type fields to string and Type.STRING, respectively
    this.str = string;
    this.type = Type.STRING;
  }

  /**
   * Creates an instance Entry with a Symbol and sets its type to SYMBOL.
   *
   * @param which this Entry's Symbol value assigned to the other field
   */
  public Entry(Symbol which) {
    // Sets the str and type fields to string and Type.STRING, respectively
    this.other = which;
    this.type = Type.SYMBOL;
  }



  // Getters
  /**
   * Gets the number component of this entry. If this Entry's type doesn't match that of the most
   * recent setter, or the constructor if a setter has not been called, then an error is thrown.
   *
   * @return the float component of this entry representating a number
   * @throws BadTypeException if the type of the Entry doesn't match the constructor and/or setters.
   */
  public Float getValue() throws BadTypeException {
    // Checks if type of Entry is Number because a value can only be a number, and not a string or
    // symbol - necessary constraints.
    // If its not then an exception should be thrown
    if (this.type != Type.NUMBER) {
      // Throw user-defined exception with a custom message
      throw new BadTypeException("Value");
    }
    // If they type is correct, then the value associated with this entry must also being correct.
    // So we return this number after all checks are completed
    return this.number;
  }

  /**
   * Gets the String component of this entry. If the Entry's type doesn't match that of the most
   * recent setter, or the constructor if not setter has been called, then an error is thrown.
   *
   * @return the String component of this entry
   * @throws BadTypeException if the type of this Entry doesn't match the constructor and/or setters
   */
  public String getString() throws BadTypeException {
    // Checks this entry is the right type before returning string
    if (this.type != Type.STRING) {
      // Throw user-defined exception with a custom message
      throw new BadTypeException("String");
    }
    // Return this entry's str field after all checks have been passed
    return this.str;
  }

  /**
   * Gets the Symbol component of this entry. If the Entry's type doesn't match that of the most
   * recent setter, or the constructor if not setter has been called, then an error is thrown.
   *
   * @return the Symbol component of this entry
   * @throws BadTypeException if the type of the Entry doesn't match the constructor and/or setters
   */
  public Symbol getSymbol() throws BadTypeException {
    // Checks this entry is the right type before returning Symbol
    if (this.type != Type.SYMBOL) {
      // Throw user-definend exception with a custom message
      throw new BadTypeException("Symbol");

    }
    // Return this Entry's other field after all checks passed
    return this.other;
  }



  /**
   * Gets the type component of this entry. If the type doesn't match any of those that have been
   * defined in the constructors or setters then the default Type of INVALID is returned.
   *
   * @return type component of this Entry
   */
  public Type getType() {
    // Checks to see if this entry has a valid type, i.e. it is one which is defined in the enum
    // Type class
    if (this.type != Type.NUMBER && this.type != Type.SYMBOL && this.type != Type.STRING) {
      // If there is an error that occurs and none of the types are matched up correctly
      // return the type as INVALID
      return Type.INVALID;
    }
    // Otherwise we return the type as normal
    return this.type;
  }


  // Setters
  /**
   * Updates the value of this entry to hold a float value. By calling this method, the type of this
   * entry is also updated to NUMBER. Updating an entry will remove all old components associated
   * with it. e.g. If an entry was created through an overloaded constructor, which took a string as
   * an argument, and setValue() is called; then that string no longer exists as a component of that
   * object.
   *
   * @param value the updated float component of this Entry
   */
  public void setValue(float value) {
    // Takes passed through arguement and sets to this Entry's number field
    this.number = value;
    // Updates the type field of this entry to satisy the condition where each getter must maatch
    // the most recent setter (or the constructor if not setter has been called
    this.type = Type.NUMBER;

  }

  /**
   * Updates the value of this entry to hold a String value. By calling this method, the type of
   * this entry is also updated to STRING. Updating an entry will remove all old components
   * associated with it. e.g. If an entry was created through an overloaded constructor, which took
   * a string as an argument, and setValue() is called; then that string no longer exists as a
   * component of that object.
   *
   * @param string the updated string component of this Entry.
   */
  public void setString(String string) {
    // Set default field str to the passed through string
    this.str = string;
    // Updates the type field of this entry
    this.type = Type.STRING;

  }

  /**
   * Updates the value of this entry to hold a String value. By calling this method, the type of
   * this entry is also updated to SYMBOL. Updating an entry will remove all old components
   * associated with it. e.g. If an entry was created through an overloaded constructor, which took
   * a string as an argument, and setValue() is called; then that string no longer exists as a
   * component of that object.
   *
   * @param symbol the updated component entry of this Entry
   */
  public void setSymbol(Symbol symbol) {
    // Updates the other field to passed through arguement
    this.other = symbol;
    this.type = Type.SYMBOL;
  }



  /**
   * Indicates whether some other object is "equal to"/is the exact same as this one. Two objects to
   * be considered equal if: Neither is null, They are both of type Entry, They have the same Type
   * field, and the appropriate field that has a meaningful value is also the same.
   * 
   * @param obj the object being compare to
   * @return true if this object is the same as the passed obj argument, otherwise false
   */
  @Override
  public boolean equals(Object obj) {
    // If the object passed through is the same as the calling one, then we know they are the same
    // and can just return true
    if (this == obj) {
      return true;
    }

    // If obj is not an instance of entry then we can straight away just return false as
    // we will not be able to compare the fields of the object at all. Similarly, if the object is
    // null, we can return false because there is nothing for the calling object to be compare to.

    if ((!(obj instanceof Entry)) || obj == null) {
      return false;
    }

    // If object is an instance of entry then we need to cast it as such so that we can access its
    // fields.
    Entry other = (Entry) obj;

    // We then compare each field to make sure that the two objects are the exact same.
    return Float.floatToIntBits(number) == Float.floatToIntBits(other.number)
        && this.other == other.other && Objects.equals(str, other.str) && type == other.type;
  }

  /**
   * Returns a hash code value for this object. If two objects are equal according to the equals
   * method, then calling the hashCode method on each of the two objects must produce the same
   * integer result using the same fields from the ones used to compare equality in the equals
   * method.
   *
   * @return the hashcode value for this object
   */
  @Override
  public int hashCode() {
    // Takes one or more objects and returns the hashcode for them.
    return Objects.hash(number, other, str, type);
  }

  /**
   * Provide a textual representation of a Symbol.
   * 
   * @return textual reprentation of this object
   */
  @Override
  public String toString() {
    // Need to return two different types here for formatting.
    // The first one is used to make sure that if a the value field of this class is null then that
    // shouldn't
    // be returned
    if (type != Type.NUMBER) {
      return "Entry [" + (str != null ? "str = " + str + ", " : "")
          + (other != null ? "other = " + other + ", " : "")
          + (type != null ? "type = " + type : "") + "]";
    } else {
      // Otherwise return all fields that are are not null
      return "Entry [number = " + number + ", " + (str != null ? "str = " + str + ", " : "")
          + (other != null ? "other = " + other + ", " : "")
          + (type != null ? "type = " + type : "") + "]";
    }
  }



}
