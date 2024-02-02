package uk.ac.rhul.cs2800;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
// import java.util.Scanner;
import java.util.function.Consumer;

/**
 * This is a text based interface which is automatically used if the program is started from the
 * command line. It also dynamically sets up observers for ViewInterface events. I have used a
 * bufferedReader as it is more efficient and generates fewer system calls when dealing with I/O
 * operations. I've used this with a try with resources block which closes all streams automatically
 * at the end of execution to prevent any resource/memory leaks I have also revised the fields to
 * have a type Runnable and Consumer.
 * 
 *
 * @author anish
 *
 */
public class AsciiView implements ViewInterface {

  /* Stores the mathematical expression */
  private String expression;
  /* Stores the result of the expression */
  private String answer;
  /* Observer event of the Calculate action */
  private Runnable calc;
  /*
   * Represents an operation that accepts a single input argument and returns noresult. Its also an
   * obsever for the type of calculator being used
   */
  private Consumer<OpType> changeOpType;
  /* Buffered reader for reading user input - much more efficeint due to fewer system calls */
  private BufferedReader br = new BufferedReader(new InputStreamReader(System.in));

  /**
   * Displays the menu options for users to choose from and to navigate with. This is printed to the
   * screen at the beginning of the calculator - on start up, and every time the user doesn't pick
   * the correct option - just to remind them of what they can choose from.
   */
  private void menuOptions() {
    System.out.println("Please enter an option: ");
    System.out.println("1. Evaluate an expression ");
    System.out.println("2. Change to Infix Calculator");
    System.out.println("3. Change to Postfix/RPN Calculator");
    System.out.println("4. Quit Calculator");
    System.out.println();
  }

  private void evaluate() {
    BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
    questionMaker();
    System.out.println("You have entered: " + expression
        + "\nIs this the expression you'd like to evaluate this expression, "
        + "please enter 'Y' or 'N'");

    try {

      if ((br.readLine()).equals("y")) {
        calculate();
      } else {
        System.out.println("Please choose 'R' to re-enter your expression or "
            + "press ANYTHING ELSE to go back to the main menu:");
        if ((br.readLine()).toLowerCase().equals("r")) {
          evaluate();
        } else {
          System.out.println("You are now being redirected back to the main menu...\n");
          menu();
        }
      }
    } catch (Exception e) {
      System.out.println("An error has occured: " + e);
    }

  }

  /**
   * Want to make sure that calc is actually being observed by something (I.e. a calculator exits)
   * before executing a call to an obsever. Otherwise will crash
   * 
   */
  private void calculate() {
    calc.notifyObservers();
    System.out.println("The answer is: " + answer);

  }

  /**
   * ChangeOpType is of type consumer which is a functional interface and has one method called
   * accept. This is a useful method as we can change "this" value to whatever we desire. In this
   * case that would be the value of OpType
   */
  private void infixCalc() {
    changeOpType.accept(OpType.INFIX);
    System.out.println(answer);
  }

  private void postfixCalc() {
    changeOpType.accept(OpType.POSTFIX);
    System.out.println(answer);
  }

  /**
   * Prompts user for input of their expression, which is then stored as a field.
   */
  private void questionMaker() {
    System.out
        .println("Please enter your expression using spaces in between each operator and operand:");
    try {
      // We don't want to close streams here. We want to keep them open incase a user re-enters an
      // expression
      expression = br.readLine();
    } catch (IOException e) {
      System.out.println("An error has occured. Please re-enter your expression:");

    }

  }


  /* Below are the immplemented methods of the View Interface */

  /**
   * Displays menu options and prompts user for inputs which result in futher actions being
   * conducted. This method, and consequently the program, ends when a user enters '4' to signal a
   * 'quit' procedure. Exceptions are supressed while using Try-With-Resources.
   */
  @Override
  public void menu() {
    String input;
    /* Keeps the calculator running until user enters 4 */
    boolean terminate = false;
    /* Display menu options */
    menuOptions();
    /* Try with resources automaticaly closes files */
    try (BufferedReader br = new BufferedReader(new InputStreamReader(System.in))) {
      /*
       * Check for terminated first, otherwise when you quit the program it will be waiting for user
       * input first to see if its null
       */
      while (!terminate && (input = br.readLine()) != null) {
        /* Switch statements are better in dealing with string comparison */
        switch (input) {
          /* Evalute */
          case "1":
            evaluate();
            break;
          /* Change to Infix Calculator */
          case "2":
            infixCalc();
            break;
          /* Change to postfix/RPN Calculator */
          case "3":
            postfixCalc();
            break;
          /* Quit calculator */
          case "4":
            terminate = true;
            System.out.println("Thank you for using the calculator, goodbye!");
            break;
          /* If user enters incorrect option - redisplay menu */
          default:
            menuOptions();
        }
      }

    } catch (Exception e) {
 
      /*
       * We don't want to print anything here because it would return a stream closed error. This is
       * due to null returning false after terminating the caluclator.
       */
    }


  }

  /**
   * Gets the question to feed into another class.
   *
   * @return the mathematical expression to be evaluated
   */
  @Override
  public String getString() {

    return this.expression;
  }

  /**
   * Allows the answer to be displayed. This is used as a hook that feeds into another class.
   *
   * @param str the calculated answer
   */
  @Override
  public void setAnswer(String str) {
    this.answer = str;

  }

  /**
   * This allows a new observer to be added to the Calc (Calculate) action.
   *
   * @param f the Oberver being notified of the new addition
   */
  @Override
  public void addCalcObserver(Runnable f) {
    this.calc = f;

  }

  /**
   * This methods adds a new Observer which changes the type of Calulator being used.
   *
   * @param l the Obsever being notified of the change in Calculators
   */
  @Override
  public void addTypeObserver(Consumer<OpType> l) {
    this.changeOpType = l;

  }

}
