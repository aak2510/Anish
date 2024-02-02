package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import org.junit.jupiter.api.Test;

class SymbolTest {
  // Reason why these are fields are because once they're set, I don't need to change them - i.e.
  // they don't update. This was refactored in after Test 7.
  private Symbol leftBracketSymbol = Symbol.LEFT_BRACKET;
  private Symbol rightBracketSymbol = Symbol.RIGHT_BRACKET;
  private Symbol timesSymbol = Symbol.TIMES;
  private Symbol divideSymbol = Symbol.DIVIDE;
  private Symbol plusSymbol = Symbol.PLUS;
  private Symbol minusSymbol = Symbol.MINUS;
  private Symbol invalidSymbol = Symbol.INVALID;


  @Test // Test 1 - To pass this test I had to create an enum class and an enum called LEFT_BRACKET.
  void testConstructorLeftBracket() {
    assertEquals(Symbol.valueOf("LEFT_BRACKET"), leftBracketSymbol,
        "Assert the value of newSymbol is LEFT_BRACKET of enum Symbol");
  }

  @Test // Test 2 - To pass this test I had to create an enum called RIGHT_BRACKET.
  void testConstructorRightBracket() {
    assertEquals(Symbol.valueOf("RIGHT_BRACKET"), rightBracketSymbol,
        "Assert the value of newSymbol is RIGHT_BRACKET of enum Symbol");
  }

  @Test // Test 3 - To pass this test I had to create an enum called TIMES.
  void testConstructorTimes() {
    assertEquals(Symbol.valueOf("TIMES"), timesSymbol,
        "Assert the value of newSymbol is TIMES of enum Symbol");
  }

  @Test // Test 4 - To pass this test I had to create an enum called DIVIDE.
  void testConstructorDivide() {
    assertEquals(Symbol.valueOf("DIVIDE"), divideSymbol,
        "Assert the value of newSymbol is DIVIDE of enum Symbol");
  }

  @Test // Test 5 - To pass this test I had to create an enum called PLUS.
  void testConstructorPlus() {
    assertEquals(Symbol.valueOf("PLUS"), plusSymbol,
        "Assert the value of newSymbol is PLUS of enum Symbol");
  }

  @Test // Test 6 - To pass this test I had to create an enum called MINUS.
  void testConstructorMinus() {
    assertEquals(Symbol.valueOf("MINUS"), minusSymbol,
        "Assert the value of newSymbol is MINUS of enum Symbol");
  }

  @Test // Test 7 - To pass this test I had to create an enum called INVALID.

  void testConstructorInvalid() {
    assertEquals(Symbol.valueOf("INVALID"), invalidSymbol,
        "Assert the value of newSymbol is TIMES of INVALID Symbol");
  }



  // Testing for the string representation of the Type enum class

  @Test // Test 8 -To pass this test, I had to create a constructor with a string field and a
        // toString method so that I could print out a textual representation of the Enum. I then
        // had to assign the value "(" to the enum LEFT_BRACKET
  void testToStringLeftBracket() {
    assertEquals("(", leftBracketSymbol.toString(),
        "Test Symbol Enum value, LEFT_BRACKET, is printed in in string format '('");

  }

  // REFACTORED HERE - Made Fields of the test class using the variable names I used in each
  // individual test before Test 9. This is so I could use the same enums through out the test and
  // stop creating new ones and remove OAOO smells

  @Test // Test 9 To pass this test I had to assign ")" to the Enum RIGHT_BRACKET
  void testToStringRightBracket() {
    assertEquals(")", rightBracketSymbol.toString(),
        "Test Symbol Enum value RIGHT_BRACKET is printed in in string format ')'");

  }

  @Test // Test 10 To pass this test I had to assign "*" to the Enum TIMES
  void testToStringTimes() {
    assertEquals("*", timesSymbol.toString(),
        "Test Symbol Enum value TIMES is printed in in string format '*'");
  }

  @Test// Test 11 To pass this test I had to assign "/" to the Enum DIVIDE
  void testToStringDivide() {
    assertEquals("/", divideSymbol.toString(),
        "Test Symbol Enum value DIVIDE is printed in in string format '/'");
  }

  @Test // Test 12 To pass this test I had to assign "+" to the Enum PLUS
  void testToStringPlus() {
    assertEquals("+", plusSymbol.toString(),
        "Test Symbol Enum value PLUS is printed in in string format '+'");
  }

  @Test // Test 13 To pass this test I had to assign "-" to the Enum MINUS
  void testToStringMinus() {
    assertEquals("-", minusSymbol.toString(),
        "Test Symbol Enum value MINUS is printed in in string format '-'");
  }

  @Test // Test 14 To pass this test I had to assign "!" to the Enum INVALID
  void tesToStringInvalid() {
    assertEquals("!", invalidSymbol.toString(),
        "Test Symbol Enum value INVALID is printed in in string format '!'");
  }



}
