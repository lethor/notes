/*
   Time class by Ben Thornton
   CS 111B, Spring 2008
*/

class Time
{
  private int hours, minutes, someTime;
  private static int curTime;

  public Time(int h, int m)
  {
    hours = h;
    minutes = m;
  }

  private int normalizeMinutes(int m)
  {
  }

  private int normalizeHours(int h)
  {
  }

  private String formatTime(int h, int m)
  {
    String time;

    h += m / 60;
    m %= 60;
    h %= 24;

    if (hours < 10)
      time = "0" + hours;
    else
      time = hours;

    time += ":";

    if (minutes < 10)
      time += "0" + minutes;
    else
      time += minutes;
  }

  public void show(boolean twelveHour)
  {
  }

  public static void setCurTime(int h, int m)
  {
  }

  public static void showCurTime(boolean twelveHour)
  {
  }

  public static void addToCurTime(int m)
  {
  }

  public boolean isLaterToday()
  {
  }

}
