/* Ben Thornton
   CS 110B
   Spring 2005

   Week 1 Extra Credit
   Chapter 4, Exercise 14
*/

#include <iostream>
#include <iomanip>
using namespace std;

int main()
{
  float start, charges;
  int length, start_m, start_h, minutes;

  cout << "\nWhat time did you place the call? (e.g. 20.00 for 8 o'clock) ";
  cin >> start;

  start_h = static_cast<int>(start);
  start_m = start - start_h;

  while(start_m < 0 || start_m > 59 || start_h < 0 || start_h > 23)
  {
    cout << "\nThat is not a valid time. Please try again: ";
    cin >> start;

    start_h = static_cast<int>(start);
    start_m = start - start_h;
  }

  cout << "\nHow long were you on the phone (in minutes)? ";
  cin >> minutes;

  if(start < 6.59)
    charges = minutes * 0.12;
  else if(start > 19)
    charges = minutes * 0.35;
  else
    charges = minutes * 0.55;

  cout << "\nFor this call, your charges come to $";
  cout << setprecision(2) << fixed << charges << endl << endl;
}
