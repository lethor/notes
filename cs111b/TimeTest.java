/*
   TimeTest.java by Craig Persiko
   Test File for CS 111B Practice Problem 3

   This tests the Time class, which is used to store a time of day and output it.
   It also store the current time of day.
*/

import java.util.Scanner;

class TimeTest
{
  public static void main(String args[])
  {
    Scanner scan = new Scanner (System.in);
    String entry;
    int colonIdx, hour, min;
    Time breakfastTime, lunchTime, dinnerTime;

    System.out.print("What time is it? (Please use 24-hour hh:mm format) ");
    entry = scan.nextLine();
    colonIdx = entry.indexOf(':');
    hour = Integer.parseInt(entry.substring(0, colonIdx));
    min = Integer.parseInt(entry.substring(colonIdx+1));
    Time.setCurTime(hour, min);

    breakfastTime = new Time(9, 0); // store 9:00 AM
    lunchTime = new Time(12, 0); // store 12:00 PM
    dinnerTime = new Time(18, 30); // store 6:30 PM

    System.out.print("It's now ");
    Time.showCurTime(false);     // display current time
    System.out.print("\nBreakfast is at ");
    breakfastTime.show(true);              // display with AM
    if(breakfastTime.isLaterToday())
      System.out.println("\nwhich is later today.");
    else
      System.out.println("\nwhich is not until tomorrow.");

    System.out.print("Lunch is at ");
    lunchTime.show(true);              // display with PM
    if(lunchTime.isLaterToday())
      System.out.println("\nwhich is later today.");
    else
      System.out.println("\nwhich is not until tomorrow.");

    System.out.print("Dinner is at ");
    dinnerTime.show(false);              // display without PM
    if(dinnerTime.isLaterToday())
      System.out.println("\nwhich is later today.");
    else
      System.out.println("\nwhich is not until tomorrow.");

    Time.addToCurTime(90);  // make current time 90 minutes later
    System.out.print("Imagine 90 minutes have passed and it is now ");
    Time.showCurTime(true);     // display current time
    if(lunchTime.isLaterToday())
      System.out.println("\nLunch is later today.");
    else
      System.out.println("\nLunch is not until tomorrow.");
    if(dinnerTime.isLaterToday())
      System.out.println("Dinner is later today.");
    else
      System.out.println("Dinner is not until tomorrow.");
  }
}

/* Sample Output:

What time is it? (Please use 24-hour hh:mm format) 10:45
It's now 10:45
Breakfast is at 9:00AM
which is not until tomorrow.
Lunch is at 12:00PM
which is later today.
Dinner is at 18:30
which is later today.
Imagine 90 minutes have passed and it is now 12:15PM
Lunch is not until tomorrow.
Dinner is later today.

-----------------------------------------------------

What time is it? (Please use 24-hour hh:mm format) 17:30
It's now 17:30
Breakfast is at 9:00AM
which is not until tomorrow.
Lunch is at 12:00PM
which is not until tomorrow.
Dinner is at 18:30
which is later today.
Imagine 90 minutes have passed and it is now 7:00PM
Lunch is not until tomorrow.
Dinner is not until tomorrow.

*/
