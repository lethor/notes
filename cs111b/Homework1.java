import java.util.Scanner;

class Homework1
{
  public static void main(String[] args)
  {
    Scanner scan = new Scanner(System.in);
    int times;

    System.out.println("Ben");
    System.out.println("Thornton");

    System.out.print("How many times do you want it repeated? ");
    times = scan.nextInt();

    for (int i = 0; i < times; i++)
    {
      System.out.print("Ben Thornton ");
    }

    System.out.println();
  }
}
