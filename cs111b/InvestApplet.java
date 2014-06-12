/* Craig Persiko - CS 111B - Sample program
   InvestApplet.java

   An applet to calculate the interest earned on an investment.
*/

import javax.swing.JApplet;
import javax.swing.JOptionPane;
import java.text.DecimalFormat;

public class InvestApplet extends JApplet
{
  public void start()  // execute this code each time the page is loaded,
                       // not each time the applet is painted (like paint would do).
  {
    String response; // declare a String object variable to store the user's entry
    double balance;
    DecimalFormat money = new DecimalFormat("0.00");  // used to format numeric output

    response = JOptionPane.showInputDialog("How much money do you want to invest?");
    balance = Double.parseDouble(response);

    for(int i=0; i < 10; i++)  // each year for 10 years
      balance += balance * 0.05;  // add 5% interest to the balance.

    JOptionPane.showMessageDialog(null, "After 10 years at 5% interest, " +
                                  "you will have $" + money.format(balance));
  }
}

