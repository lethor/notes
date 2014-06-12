/* Ben Thornton
   CS 110B
   Spring 2005

   Week 2 Extra Credit
   Chapter 6, Exercise 6

   Calculate your hospital bill.
*/

#include <iostream>
#include <iomanip>
using namespace std;

float calculate(int days, float rate, float meds, float serv);
float calculate(float meds, float serv);

int main()
{
  char op;
  int days;
  float rate, meds, serv, due;

  cout << "\nHi. I'll calculate your hospital bill.";
  cout << "\nWere you an outpatient? ";
  cin >> op;

  while(op != 'Y' && op != 'y' && op != 'N' && op != 'n')
  {
    cout << "Please type Y or N: ";
    cin >> op;
  }

  if(op == 'Y' || op == 'y')
  {
    cout << "How many days were you in the hospital? ";
    cin >> days;
    cout << "What is the daily rate that you'll pay? $";
    cin >> rate;
  }

  cout << "What is your amount due for medicine? $";
  cin >> meds;
  cout << "What is your amount due for services? $";
  cin >> serv;

  if(op == 'Y' || op == 'y')
    due = calculate(days, rate, meds, serv);
  else
    due = calculate(meds, serv);

  cout << "\nYour total for this visit comes to $";
  cout << setprecision(2) << fixed << due << ".\n\n";
}

float calculate(int days, float rate, float meds, float serv)
{
  float due;
  due = (days * rate) + meds + serv;
  return due;
}

float calculate(float meds, float serv)
{
  float due;
  due = meds + serv;
  return due;
}
