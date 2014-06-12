/* Ben Thornton
   CS 110B
   Spring 2005

   Week 10 Mandatory Assignment
   Chapter 12, Exercise 3

   Design a class to calculate the number days required
   to produce a certain number of widgets. The factory
   has 2 eight-hour shifts each day, and can produce 10
   widgets in one hour (i.e. 160 widgets per day).
*/

#include <iostream>
using namespace std;

class WidgetWorkCalculator
{
  private:
    int widgets;
    int days;

  public:
    WidgetWorkCalculator();
    void getDays();
};

int main()
{
  WidgetWorkCalculator order;
  order.getDays();

  return 0;
}

WidgetWorkCalculator::WidgetWorkCalculator()
{
  cout << "\nHow many widgets would you like? ";
  cin >> widgets;
  while (widgets < 0)
  {
    cout << "Please enter a positive number: ";
    cin >> widgets;
  }
}

void WidgetWorkCalculator::getDays()
{
  days = widgets / 160;

  if (widgets % 160)
    days++;

  cout << "Your widgets will be ready in " << days << " days.\n\n";
}
