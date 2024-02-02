package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;
import static org.junit.jupiter.api.Assertions.fail;
import org.junit.jupiter.api.Test;

class EntryTest {
  private Entry newEntry;
  private Entry stringTest;


  // Test 1 - To pass this I had to Create an Entry with a float arguement
  @Test // Test 1
  void floatConstructorTest() {
    newEntry = new Entry(0f);

  }

  // Test 2 - To pass this test I had to create an overloaded Entry constructor with a string
  // arguement. *REFACTORED HERE created newEntry field*
  @Test // Test 2
  void stringConstructorTest() {
    newEntry = new Entry("Test");

  }

  // Test 3 - To pass this test I had to create an overloaded Entry constructor with a Symbol
  // arguement.
  @Test // Test 3
  void symbolContructorTest() {
    newEntry = new Entry(Symbol.LEFT_BRACKET);
  }



  // Getter tests

  // Test 4 - See if getter returns the correct value.
  // To pass this test I had to create a method in the Entry class - getValue(), which returned the
  // number field associated with this entry.
  @Test // Test 4
  void testGetValue() {
    newEntry = new Entry(5f);
    try {
      assertEquals(5.0f, newEntry.getValue(), "Test to make sure the correct values are returned");
    } catch (Exception e) {
      fail("No error should be thrown here");
    }
  }



  // Test 5 - See if getter returns the correct String.
  // To Pass this test I had to create another getter Method called getString(). This then
  // returned the value of the string field of this entry which was set after creating an
  // entry with a string arguement
  @Test // Test 5
  void testGetString() {
    newEntry = new Entry("This is a test");
    try {
      assertEquals("This is a test", newEntry.getString(),
          "Test to make sure the correct values are returned");
    } catch (BadTypeException e) {
      fail("No error should be thrown here");
    }
  }


  // Test 6 - See if getter returns the correct symbol. To Pass this test I had to create
  // another getter Method called getString(). This then returned the value of the string
  // field of this entry which was set after creating an entry with a string arguement
  @Test // Test 6
  void testGetSymbol() {
    newEntry = new Entry(Symbol.RIGHT_BRACKET);
    try {
      assertEquals(Symbol.RIGHT_BRACKET, newEntry.getSymbol(),
          "Test to make sure the correct values are returned");
    } catch (BadTypeException e) {
      fail("No error should be thrown here");
    }
  }


  // Test 7 - To pass this test I had to add an if statement in the getValue() method to verify that
  // the type of the entry was the same as the getter. e.g if getValue() was called I had to make
  // sure that the type of "this" was a number too. This is because access to the object is
  // goverened by the type of the object. This throws an exeception if the wrong getter is called on
  // an object. *REFACTORED HERE* Had to had a try and catch clause to previous test using getters
  @Test // Test 7
  void exceptionTest() {
    try {
      Entry entry = new Entry(5.0f); // So float
      assertEquals(5.0f, entry.getValue(), "Test to make sure the correct values are returned");
      assertThrows(BadTypeException.class, () -> entry.getString(),
          "Most recent setter not matched, cannot return string");
      assertThrows(BadTypeException.class, () -> entry.getSymbol(),
          "Most recent setter not matchedm cannot return symbol");
    } catch (BadTypeException e) {
      fail("No error should be thrown here");
    }
  }


  // Test 8 - To pass this test I had to create a method in the Entry class called getType.
  @Test // Test 8
  void testGetType() {
    newEntry = new Entry(5f);
    assertEquals(Type.NUMBER, newEntry.getType(), "Test to see if type returns correctly");

    newEntry = new Entry("This is a string");
    assertEquals(Type.STRING, newEntry.getType(), "Test to see if type returns correctly");

    newEntry = new Entry(Symbol.RIGHT_BRACKET);
    assertEquals(Type.SYMBOL, newEntry.getType(), "Test to see if type returns correctly");

  }

  // Setter test


  // Test 9 - To pass this test I had to create a setter method called setValue(). Updating the
  // value attribute associated with the current Entry
  @Test // Test 9
  void testSetValue() {
    try {
      newEntry = new Entry(5f);
      newEntry.setValue(10f);
      assertEquals(10f, newEntry.getValue(),
          "Test to see if the updated float value of newEntry is returned");
    } catch (BadTypeException e) {
      fail("Nothing should be reached here");
    }

  }


  // Test 10 - To pass this test I had to create a setter method called setString(). Updating the
  // string value of the current entry object
  @Test // Test 10
  void testSetString() {
    try {
      newEntry = new Entry("This is a string which needs to be updated");
      newEntry.setString("This is the new string which should be returned");
      assertEquals("This is the new string which should be returned", newEntry.getString(),
          "Test to see if the updated String value of newEntry is returned");
    } catch (BadTypeException e) {
      fail("Nothing should be reached here");
    }

  }


  // Test 11 - To pass this test I had to create a setter method called setSymbol(). Updating the
  // Symbol value of the current entry object
  @Test // 11th Test
  void testSetSymbol() {
    try {
      newEntry = new Entry(Symbol.LEFT_BRACKET);
      newEntry.setSymbol(Symbol.RIGHT_BRACKET);
      assertEquals(Symbol.RIGHT_BRACKET, newEntry.getSymbol(),
          "Test to see if the updated Symbol value of newEntry is returned");
    } catch (BadTypeException e) {
      fail("Nothing should be reached here");
    }

  }



  // Test 12 To pass this test I had to update all 3 setters in my Entry class so it also updates
  // the type of the Entry while updating the respective values. E.g this.type = Type.NUMBER; was
  // added in to setValue() so that the Exception works as intended to.
  @Test // Test 12
  void testSettersWithException() {
    try {
      newEntry = new Entry(5f);
      newEntry.setSymbol(Symbol.RIGHT_BRACKET);
      newEntry.setString("This is the most recent setter");

      assertEquals("This is the most recent setter", newEntry.getString(),
          "Test to see if the updated Symbol value of newEntry is returned");

      assertThrows(BadTypeException.class, () -> newEntry.getValue(),
          "Does not match recent setter so throw an exception");

      assertThrows(BadTypeException.class, () -> newEntry.getSymbol(),
          "Does not match recent setter so throw an exception");

    } catch (BadTypeException e) {

      fail("Nothing should be reached here");

    }

  }



  // Test 13 - To pass this test I had to create a 2 overrriden methods called equals() and
  // hashcode(). For equals I had to make that the 2 instances of Entry were the same by first
  // checking if the two objects weere equal, if not then checking if they are of the same instance.
  // If they were then I had to compare each value of their attributes and see if the match exactly.
  // For Hashcode I had to use the hash() method to compute a suitable value.
  @Test // Test 13
  void testHashCodeEqualsForNumbers() {
    // equals and hashCode check name field value
    newEntry = new Entry(10f);
    Entry newEntryTwo = new Entry(10f);
    // a == b & b == a (Symmetric property of equals)
    assertTrue(newEntry.equals(newEntryTwo) && newEntryTwo.equals(newEntry));
    // a == a (Reflexive property of equals)
    assertTrue(newEntry.equals(newEntry));
    assertTrue(newEntryTwo.equals(newEntryTwo));
    assertTrue(newEntry.hashCode() == newEntryTwo.hashCode());
  }


  // Test 14,15 and 16 automatically passed as the code was implement for test 13
  @Test // Test 14
  void testHashCodeEqualsForStrings() {
    // equals and hashCode check name field value
    newEntry = new Entry("This is an equality Test");
    Entry newEntryTwo = new Entry("This is an equality Test");
    // a == b & b == a (Symmetric property of equals)
    assertTrue(newEntry.equals(newEntryTwo) && newEntryTwo.equals(newEntry));
    // a == a (Reflexive property of equals)
    assertTrue(newEntry.equals(newEntry));
    assertTrue(newEntryTwo.equals(newEntryTwo));
    assertTrue(newEntry.hashCode() == newEntryTwo.hashCode());
  }

  @Test // Test 15
  void testHashCodeEqualsForSymbols() {
    // equals and hashCode check name field value
    newEntry = new Entry(Symbol.DIVIDE);
    Entry newEntryTwo = new Entry(Symbol.DIVIDE);
    // a == b & b == a (Symmetric property of equals)
    assertTrue(newEntry.equals(newEntryTwo) && newEntryTwo.equals(newEntry));
    // a == a (Reflexive property of equals)
    assertTrue(newEntry.equals(newEntry));
    assertTrue(newEntryTwo.equals(newEntryTwo));
    assertTrue(newEntry.hashCode() == newEntryTwo.hashCode());
  }

  @Test // Test 16
  void testHashCodeEqualFail() {
    // equals and hashCode check name field value
    newEntry = new Entry(Symbol.DIVIDE);
    Entry newEntryTwo = new Entry(10f);
    // a == b & b == a (Symmetric property of equals)
    assertTrue(!(newEntry.equals(newEntryTwo) && newEntryTwo.equals(newEntry)));
    // a == a (Reflexive property of equals)
    assertTrue(newEntry.hashCode() != newEntryTwo.hashCode());
  }



  // Test 17 - To pass this test I had to create an overridden Two string method which took the
  // private attributes of the Entry object and portrayed a textual representaion
  @Test // Test 17
  void testToStringValue() {
    Entry stringTest = new Entry(25f);
    String output = "Entry [number = 25.0, type = Number]";
    assertEquals(output, stringTest.toString(), "Textual representation should output non-null values");

  }

  // Tests 18 and 19 automatically passed as the code was implemented for Test 17
  @Test // Test 18
  void testToStringString() {
    stringTest = new Entry("This is to test the string represention of Entry");
    String output = "Entry [str = This is to test the string represention of Entry, type = String]";
    assertEquals(output, stringTest.toString(), "Textual representation should output non-null values");
  }

  @Test // Test 19
  void testToStringSymbol() {
    stringTest = new Entry(Symbol.LEFT_BRACKET);
    String output = "Entry [other = (, type = Symbol]";
    assertEquals(output, stringTest.toString(), "Textual representation should output non-null values");
  }

}
