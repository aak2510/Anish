package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;

class TypeTest {

  // Reason why these are fields are because once they're set, I don't need to change them - i.e.
  // they don't update
  Type createEnum; // Updating enum - default type to remove error of "not being create"
  private Type typeNumber = Type.NUMBER;
  private Type typeSymbol = Type.SYMBOL;
  private Type typeString = Type.STRING;
  private Type typeInvalid = Type.INVALID;

  @Test // Test 1 - enum creation failed. Made an enum - NUMBER
  void testCreateEnumNumber() {
    createEnum = Type.NUMBER;
  }

  @Test // Test 2 - enum creation failed. Made an enum SYMBOL
  void testCreateEnumSymbol() {
    createEnum = Type.SYMBOL;
  }

  @Test // Test 3 - enum creation failed. Made an enum STRING
  void testCreateEnumString() {
    createEnum = Type.STRING;
  }

  @Test // Test 4 - enum creation failed. Made an enum INVALID
  void testCreateEnumInvalid() {
    createEnum = Type.INVALID;
  }

  @Test // Test 5 - check if the correct enum value is created for Number
  void testNumber() {
    assertEquals(Type.valueOf("NUMBER"), typeNumber,
        "Assert the value of the variable, type, is NUMBER of enum Type");

  }

  @Test // Test 6 - check if the correct enum value is created for Symbol
  void testSymbol() {
    assertEquals(Type.valueOf("SYMBOL"), typeSymbol,
        "Assert the value of the variable, type, is SYMBOL of enum Type");

  }

  @Test // Test 7 - check if the correct enum value is created for String
  void testString() {
    assertEquals(Type.valueOf("STRING"), typeString,
        "Assert the value of the variable, type, is STRING of enum Type");

  }

  @Test // Test 8 - check if the correct enum value is created for Invalid
  void testInvalid() {
    assertEquals(Type.valueOf("INVALID"), typeInvalid,
        "Assert the value of the variable, type, is INVALID of enum Type");
  }

  @Test // Test 9 - toString added after fields were not printing out a textual representation.
        // REFACTORED to make 4 types a field in this test class. Removing OAOO smell
  void testprintableNumber() {
    assertEquals("Number", typeNumber.toString(),
        "Test Enum value 'NUMBER' printed in in string format, 'Number'");
  }

  @Test // Test 10
  void testPrintableSymbol() {
    assertEquals("Symbol", typeSymbol.toString(),
        "Test Enum value 'SYMBOL' printed in in string format, 'Symbol'");
  }

  @Test // Test 11
  void TestprintableString() {
    assertEquals("String", typeString.toString(),
        "Test Enum value 'STRING' printed in in string format, 'String'");
  }

  @Test // Test 12
  void testPrintInvalid() {
    assertEquals("Invalid", typeInvalid.toString(),
        "Test Enum value 'INVALID' printed in in string format, 'Invalid'");
  }


}
