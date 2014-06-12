/* Ben Thornton
   CS 110B
   Spring 2005

   Week 11 Mandatory Assignment
   Chapter 12, Exercise 6

   Design a payroll class with the following member functions:
   * Employee's hourly pay rate
   * Number of hours worked
   * Total pay for the week
   Use an array of 7 payroll objects. Ask the user the number
   of hours worked (<60), then display gross pay.
*/

#include <iostream>
using namespace std;

class PayRoll
{
  private:
    int hours;
    float gross, rate;

  public:
    PayRoll();
    void setHours();
    void grossPay();
};

int main()
{
  PayRoll employee[7];

  for (int i = 0; i < 7; i++)
  {
    employee[i].setHours();
    employee[i].grossPay();
  }

  return 0;
}

PayRoll::PayRoll()
{
  rate = 16.00;
}

void PayRoll::setHours()
{
  cout << "\nHow many hours did you work this week? ";
  cin >> hours;

  while (hours > 60)
  {
    cout << "You can only clock 60 hours per week. Try again: ";
    cin >> hours;
  }
}

void PayRoll::grossPay()
{
  gross = hours * rate;

  cout << "Your gross pay for the week is $" << gross << endl;
}
