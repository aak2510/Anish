package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;

class OpTypeTest {

  private OpType infix = OpType.INFIX;
  private OpType postfix = OpType.POSTFIX;


  /*
   * Test 1 - Seeing as the OpType class was already created due to the interface that I had created
   * before hand, I now need to populate it with the correct enums This first test is going to see
   * if we can create an Enum of Type infix.
   */
  @Test
  void testConstructorInfix() {
    assertEquals(OpType.valueOf("INFIX"), infix,
        "Assert the value of infix is INFIX of enum OpType");
  }

  /*
   * Test 2 - I now need to create a second enum of type Postfix. This is the same way I created
   * OpType.INFIX except we will add one for postfix
   */
  @Test
  void testConstructorPostfix() {
    assertEquals(OpType.valueOf("POSTFIX"), postfix,
        "Assert the value of postfix is POSTFIX of enum OpType");
  }

}
