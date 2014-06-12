import javax.swing.JOptionPane;

class DemoDialogs
{
  public static void main(String[] args)
  {
    String ageString;
    int age;

    ageString = JOptionPane.showInputDialog("How old are you?");
    age = Integer.parseInt(ageString);
    JOptionPane.showMessageDialog(null, "You will be " + (age + 1) + " years old next year.");

    System.exit(0);
  }
}
