/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 4

   This program models a loan program. Interest is compounded monthly.
   The user enters the principle, the annual percentage rate, and the
   monthly payment. The program tells the user how long it will take to
   pay off the loan (in months), the amount due in the final payment,
   and the total amount of interest accumulated over the life of the
   loan.
*/

#include <iostream>
using namespace std;

void precision(int x);
void in(double& pri, double& apr, double& pay);
double correct(double value);
int calc(double& pri, double& mpr, double& pay, double& acc);
void out(double& pri, double& acc, int& months);

int main()
// Declares necessary variables and calls the other functions.
{
  double pri, mpr, pay, acc = 0;
  int months;

  precision(2);
  in(pri, mpr, pay);
  months = calc(pri, mpr, pay, acc);
  out(pri, acc, months);

  return 0;
}

void precision(int x)
// Specifies the number of digits displayed after a decimal point.
{
  cout.setf(ios::showpoint);
  cout.setf(ios::fixed);
  cout.precision(x);
}

void in(double& pri, double& mpr, double& pay)
// Asks for input from the user.
// Requires that each value be positive.
// Precondition: principle, apr & pay must be declared.
// Postcondition: pri, apr, & pay must hold positive numbers.
{
  double apr;

  cout << "\nHow much have you borrowed? $";
  cin >> pri;
  if(pri < 1)
    pri = correct(pri);

  cout << "What is your annual interest rate? ";
  cin >> apr;
  if(apr < 1)
    apr =  correct(apr);
  mpr = apr / 1200;

  cout << "How much do you pay each month? $";
  cin >> pay;
  if(pay < 1)
    pay = correct(pay);
  while(pay <= pri * mpr)
  {
    cout << "\nYou will accumulate $" << pri * mpr
      << " in interest the first month.\n"
      << "You must pay off more than that: $";
    cin >> pay;
  }
}

double correct(double value)
// Forces the user to enter positive number.
// Second guesses user input if(value<1).
{
  while(value <= 0)
  {
    cout << "Please enter a positive value: ";
    cin >> value;
  }

  if(value < 1)
  {
    cout << "\nThat's an awfully small amount.\n"
         << "Please re-enter to confirm: ";
    cin >> value;
  }

  return value;
}

int calc(double& pri, double& mpr, double& pay, double& acc)
// Calculates accrued interest and debt reduction.
// Corrects itself if the user overpays on the last month.
{
  int elapsed;

  for(elapsed = 1; pri > 0; elapsed++)
  {
    acc += pri * mpr;
    pri += pri * mpr;
    pri -= pay;
  }

  if(pri < 0)
  {
    elapsed--;
    pri += pay;
  }

  return elapsed;
}

void out(double& pri, double& acc, int& months)
// Tells the user some facts about his or her loan.
{
  cout << "\nYour loan will be paid off after " << months << " months.\n";
  cout << "Your final payment will be $" << pri << ".\n";
  cout << "You will have spent $" << acc << " on interest.\n\n";
}
