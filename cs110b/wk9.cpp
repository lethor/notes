/* Ben Thornton
   CS 110B
   Spring 2005

   Week 9 Mandatory Assignment
   Chapter 12, Exercise 1

   1. Design a class called sometime. which stores 3 ints: month, day and year.
   2. Create member functions to .the date in these formats:
        12/25/04
	December 25, 2004
	25 December 2004
   3. Create 2 Date objects, and invoke each method at least once.
*/

#include <iostream>
#include <cstring>
using namespace std;

class Date
{
  private:
    int year, month, day;

  public:
    bool setYear(int y);
    bool setMonth(int m);
    bool setDay(int d);
    char* getMonthName(int m);
    void getDateWithSlashes();
    void getDateMonthFirst();
    void getDateDayFirst();
};

int main()
{
  int year, month, day;

  Date sometime;

  cout << "Please enter a year: ";
  cin >> year;
  while (!sometime.setYear(year))
  {
    cout << "Please enter an integer: ";
    cin >> year;
  }

  cout << "Please enter a month: ";
  cin >> month;
  while (!sometime.setYear(month))
  {
    cout << "Please enter a valid month: ";
    cin >> month;
  }

  cout << "Please enter a day: ";
  cin >> day;
  while (!sometime.setYear(day))
  {
    cout << "Please enter a valid day: ";
    cin >> day;
  }

  sometime.getDateWithSlashes();
  sometime.getDateMonthFirst();
  sometime.getDateDayFirst();

  return 0;
}

bool Date::setYear(int y)
{
  year = y;

  return true;
}

bool Date::setMonth(int m)
{
  if (m >= 1 && m <= 12)
  {
    month = m;
    return true;
  }
  else
  {
    return false;
  }
}

bool Date::setDay(int d)
{
  if (d >= 1 && d <= 31)
  {
    day = d;
    return true;
  }
  else
  {
    return false;
  }
}

char* Date::getMonthName(int m)
{
  char months[12][10] = {"January", "February", "March", "April",
    "May", "June", "July", "August", "September", "October",
    "November", "December"};

  return months[m - 1];
}

void Date::getDateWithSlashes()
{
  cout << month << "/" << day << "/" << year;
}

void Date::getDateMonthFirst()
{
  cout << getMonthName[month - 1] << " " << day << ", " << year;
}

void Date::getDateDayFirst()
{
  cout << day << " " << getMonthName[month - 1] << " " << year;
}
