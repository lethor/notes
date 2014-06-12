/* Craig Persiko
   liveStoryApplet.java

   Applet to input user's name and his/her story,
   then display that in a MessageDialog
*/

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class liveStoryApplet extends JApplet implements ActionListener
{
  JLabel nameLabel, storyLabel;
  JTextField nameField;
  JTextArea storyArea;
  JButton saveInfo, showInfo;
  Container mainContainer;

  String info = "No story saved";

  public void init()
  {
    Color lavender;

    mainContainer = getContentPane();
    mainContainer.setLayout(new FlowLayout());

    lavender = new Color(255,150,255);

    nameLabel = new JLabel("What is Your Name:");
    nameLabel.setBackground(lavender);
    mainContainer.add(nameLabel);
    // add nameLabel to the JApplet's content pane

    nameField = new JTextField(30);
    mainContainer.add(nameField);

    storyLabel = new JLabel("Tell Me a Story:");
    storyLabel.setBackground(lavender);
    mainContainer.add(storyLabel);

    storyArea = new JTextArea(10,30);
    mainContainer.add(storyArea);

    saveInfo = new JButton("Save");
    saveInfo.addActionListener(this);
    mainContainer.add(saveInfo);

    showInfo = new JButton("Show");
    showInfo.addActionListener(this);
    mainContainer.add(showInfo);

    mainContainer.setBackground(lavender);
  }

  // this method is the one which is called for an ActionListener when
  // an event occurs (such as the user clicking a button)
  public void actionPerformed(ActionEvent ae)
  {
    String buttonLabel = ae.getActionCommand();
    if(buttonLabel.equals("Save"))
    {
      info = nameField.getText() + "'s story:\n" + storyArea.getText();
      nameField.setText("");
      storyArea.setText("");
    }
    else // if(buttonLabel.equals("Show"))
    {
      JOptionPane.showMessageDialog(null, info);
    }
  }
}

/* This Applet is visible at:
http://fog.ccsf.cc.ca.us/~cpersiko/cs111b/NotesGuiLayout.html

The HTML file referenced by the above URL includes
the following applet tag to display this applet:

<applet code="liveStoryApplet.class" width="400"
height="320"></applet>

*/

