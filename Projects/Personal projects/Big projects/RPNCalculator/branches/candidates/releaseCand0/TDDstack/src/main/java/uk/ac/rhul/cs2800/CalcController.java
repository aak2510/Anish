package uk.ac.rhul.cs2800;

/**
 * This is a Controller which creates a view and a model. It adds itself as an observer to the view
 * so that asynchronous changes can be observed.
 * 
 * @author anish
 *
 */
public class CalcController {

  private CalcModel model;
  private ViewInterface view;
  private boolean isInfix;


  /**
   * Contructs the objects of CalcModel and the type of View. Also stores the name of method in a
   * field and when the corresponding key is pressed/clicked in a view it executes that method by
   * calling notifyObservers().
   *
   * @param model the calculator to be set for the use of the view
   * @param view the user interface to be used with the model
   */
  public CalcController(CalcModel model, ViewInterface view) {
    this.model = model;
    this.view = view;
    /*
     * no matter what gets passed in it executes these methods by calling the function
     * notifyObservers()
     */
    view.addCalcObserver(this::calculate);
    view.addTypeObserver(this::expressionType);
  }

  /**
   * Private fields instead of public as we don't want to ever change this accidentally.
   *
   * @param t enum which is used to set the type of calculator being used
   */
  private void expressionType(OpType t) {
    /* Show on the screen that the OpType has been changed. */
    view.setAnswer("Calculator changed to " + t);
    if (t == OpType.INFIX) {
      isInfix = true;
    } else {
      isInfix = false;
    }
  }


  /**
   * Private fields instead of public as we don't want to ever change this accidentally. Calls the
   * evalute method of calcModel in the model assembly.
   */
  private void calculate() {
    Float a = model.evaluate(view.getString(), isInfix);
    view.setAnswer(a.toString());
  }
}
