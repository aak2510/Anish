package uk.ac.rhul.cs2800;

/**
 * A factory which is used to generate the correct operator calculation. Its used to replace
 * conditionals, like switch statmetent, with calls to methods/objects that exhibit a particular
 * behaviour in this case arithemtic operations.
 * 
 * @author anish
 *
 */
public class OperatorFactory {

  /**
   * This method is used to automatically return the action to be conducted.
   *
   * @param operator the Enum which is used to determine the type of operation being conducted
   * @return an instance of a class that will act upon an expression
   */
  public static OperatorType enumType(Symbol operator) {
    switch (operator) {
      case DIVIDE:
        return new DivideOperation();
      case TIMES:
        return new MultiplyOperation();
      case PLUS:
        return new PlusOperation();
      case MINUS:
        return new MinusOperation();
      default:
        break; // The rest of the symbols in the enum class are not operators and are not needed in
               // RPN.

    }
    return null;
  }
}
