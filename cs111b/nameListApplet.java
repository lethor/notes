/* Ben Thornton
   nameListApplet.java

   Practice Problem 4

   Interactively display a list of names.
*/

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class nameListApplet extends JApplet implements ActionListener
{
  JLabel nameLabel, storyLabel;
  JTextField nameField;
  JTextArea nameList;
  JButton addToList, clearList;
  Container mainContainer;

  String info = "No story saved";

  public void init()
  {
    mainContainer = getContentPane();
    mainContainer.setLayout(new FlowLayout());

    nameLabel = new JLabel("<h1>Ben's Name List Applet</h1>");
    mainContainer.add(nameLabel);

    nameLabel = new JLabel("Enter Name:");
    mainContainer.add(nameLabel);

    nameField = new JTextField(30);
    mainContainer.add(nameField);

    addToList = new JButton("Add to List");
    addToList.addActionListener(this);
    mainContainer.add(addToList);

    clearList = new JButton("Clear List");
    clearList.addActionListener(this);
    mainContainer.add(clearList);

    nameList = new JTextArea(10,30);
    mainContainer.add(nameList);
  }

  public void actionPerformed(ActionEvent ae)
  {
    String buttonLabel = ae.getActionCommand();

    if(buttonLabel.equals("Save"))
    {
      info = nameField.getText() + "'s story:\n" + nameList.getText();
      nameField.setText("");
      nameList.setText("");
    }
    else // if(buttonLabel.equals("Show"))
    {
      JOptionPane.showMessageDialog(null, info);
    }
  }
}
