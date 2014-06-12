/*

What is the current year? 2008
What year were you born?
You are 35 years old (or so).

*/

class Year()
{
  private static int curYearNum; // the current year
  private int yearNum; // year of birth

  public static void Year (int initYear)
  {
  }

  public int yearsAgo()
  {
    return yearNum - curYearNum;
  }

  public static void main(String[] args)
  {
    int y;
    Console con = new Console(System.in);

    System.out.print("What is the current year? ");
    y = con.nextInt();

    Year.setCurYear(y);

    System.out.print("What year were you born? ");
    y = con.nextInt();

    Year born = new Year(y);

    System.out.println("You are " + born.yearsAgo() + " years old.");
  }
}
