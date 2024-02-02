package uk.ac.rhul.cs2800;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class DivideOperationTest {
  private DivideOperation dividing;

  @BeforeEach
  void createDivisionOperation() {
    dividing = new DivideOperation();
  }


  /*
   * Test 1 - As the class was already created due to OperatorFactory, I can start testing and
   * implementing - through TDD - to see if this class will carry out all the operations its
   * intended to do. First we will check that error can be handled. This test passed as we were
   * faking to initally start off with
   */
  @Test
  void numeratorZeroTest() {

    assertEquals(0, dividing.calculate(0, 0),
        "If numerator is 0 then 0 should be returned straight away.");
  }


  /*
   * Test 2- Here we need to make sure that the actual division is working. We do this by passing
   * two arguements and calculate the division result of the arguements. Because this is division,
   * the order of operator does matter. We must make sure that we divide the second value by the
   * first as popping these values off the stack in RevPolishCalc would reverse the order normally.
   * We need to make sure that division by 0 is handled appropriately So we need to print to the err
   * output and return something other than infinity. This failed at first as we were faking for
   * test 1 but all I had to do to pass this was to return the correct "formula" instead of 0.
   */
  @Test
  void denominatorZeroTest() {

    assertEquals(Float.POSITIVE_INFINITY, dividing.calculate(0, 25),
        "Should throw an invalidException as we cannot divide by 0.");
    assertEquals(Float.NEGATIVE_INFINITY, dividing.calculate(0, -25),
        "Should throw an invalidException as we cannot divide by 0.");

  }


  /*
   * Test 3 - Test to make sure that correct division takes place. This test should just pass
   * becuase of the previous TDD cases. REFACTORED: Created DivideOperation object as a @beforeEach
   * tag so that I don't have to create one each time.
   */
  @Test
  void divisionTest() {
    assertEquals(5f, dividing.calculate(5, 25), "Normal Division, return 5.");
    assertEquals(-6f, dividing.calculate(5, -30), "Normal Division, return -6.");
    assertEquals(-5f, dividing.calculate(-5, 25), "Normal Division, return -5.");
    assertEquals(100000f, dividing.calculate(10, 1000000), "Normal Division, return 100000.");
  }
}
