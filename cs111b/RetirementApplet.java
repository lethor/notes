/* Ben Thornton
 * CS 111B
 * Practice Problem 2
 * RetirementApplet.java
*/

import javax.swing.JApplet;
import javax.swing.JOptionPane;
import java.text.DecimalFormat;

public class RetirementApplet extends JApplet
{
  public void start()  // execute this code each time the page is loaded,
                       // not each time the applet is painted (like paint would do).
  {
    String response; // declare a String object variable to store the user's entry
    int age, years;
    double amount, savings = 0;
    DecimalFormat money = new DecimalFormat("0.00");  // used to format numeric output

    response = JOptionPane.showInputDialog("How old are you?");
    age = Integer.parseInt(response);

    if (age > 64)
    {
      JOptionPane.showMessageDialog(null, "You are too old to save for retirement.");
    }
    else
    {
      response = JOptionPane.showInputDialog("How much money would you like to save each month?");
      amount = Double.parseDouble(response);

      years = 65 - age;

      for(int i=0; i < years; i++) {  // each year for 10 years
        savings *= 0.05;
        savings += amount;
      }

      JOptionPane.showMessageDialog(null, "After " + years + " at 5% interest, " +
                                    "you will have $" + money.format(savings));
    }
  }
}

