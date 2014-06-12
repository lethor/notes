/* Ben Thornton
   CS 110B
   Spring 2005

   Week 3 Extra Credit
   Chapter 7, Exercise 6

   Store employee payroll data in arrays by field.
*/

#include <iostream>
using namespace std;

int main()
{
  long empId[7] = {5658845, 4520125, 7895122, 8777541,
    8451277, 1302850, 7580489};
  int hours[7] = {0,0,0,0,0,0,0}, i;
  float payRate[7], wages[7];

  for(i = 0; i < 7; i++)
  {
    cout << "\nTell me about employee number " << empId[i];

    cout << "\nHow many hours did s/he work this week? ";
    cin >> hours[i];
    while(hours[i] < 0)
    {
      cout << "\nPlease enter a number greater than zero: ";
      cin >> hours[i];
    }

    cout << "What hourly rate is s/he getting paid? $";
    cin >> payRate[i];
    while(payRate[i] < 6)
    {
      cout << "\nPlease enter a valid wage (at least $6/hr.): $";
      cin >> payRate[i];
    }

    wages[i] = hours[i] * payRate[i];
  }

  cout << "\nEmp. ID\tGross Wages\n-------\t-----------\n";
  for(i = 0; i < 7; i++)
  {
    cout << empId[i] << "\t" << wages[i] << endl;
  }

  cout << endl;
  return 0;
}
