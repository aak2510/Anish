package uk.ac.rhul.cs2800;

/**
 * Runs the Model Assembly of the calculator using a User Interface.
 *
 * @author anish
 *
 */
public class Driver {


  /**
   * Creates a view and model which is added to the controller and runs the interface.
   *
   * @param args the command line arguements
   */
  public static void main(String[] args) {

    ViewInterface view = new AsciiView();
    CalcModel model = new CalcModel();
    new CalcController(model, view);
    view.menu();


  }
}
