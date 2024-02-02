package uk.ac.rhul.cs2800;

import java.util.function.Consumer;

/**
 * An interface to be used to add observers to a controller when used with User Interfaces.
 *
 * @author anish
 *
 */
public interface ViewInterface {

  /**
   * Gets the question to feed into another class.
   *
   * @return the mathematical expression to be evaluated
   */
  public String getString();

  /**
   * Allows the answer to be displayed. This is used as a hook that feeds into another class.
   *
   * @param str the calculated answer
   */
  public void setAnswer(String str);

  /**
   * This allows a new observer to be added to the Calc (Calculate) action.
   *
   * @param f the Oberver being notified of the new addition
   */
  public void addCalcObserver(Runnable f);

  /**
   * This methods adds a new Observer which changes the type of Calulator being used.
   *
   * @param l the Obsever being notified of the change in Calculators
   */
  public void addTypeObserver(Consumer<OpType> l);


  /**
   * The main method that is ran in each view by a Driver class.
   */
  public void menu();

}
