/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 1

   This program converts distances expressed in miles
   to their equivalent value in kilometers.
*/

#include <iostream>
using namespace std;

int main()
{
  double mi, km;
  const double kmPerMi = 1.6093;
  int x;
  char repeat;

  do
  {
    cout << "\nPlease enter a distance in miles: ";
    cin >> mi;
    cout << "Show how many decimal places? ";
    cin >> x;

    //Magic Formula
    cout.setf(ios::fixed);
    cout.setf(ios::fixed);
    cout.precision(x);

    km = mi * kmPerMi;
    cout << mi << " miles is the same as " << km << " kilometers.\n"
         << "Would you like to do another conversion (Enter Y or N)? ";
    cin >> repeat;

    while(repeat != 'y' && repeat != 'Y' &&
          repeat != 'n' && repeat != 'N')
    {
      cout << "Invalid entry. Please enter Y or N: ";
      cin >> repeat;
    }
  }
  while(repeat == 'y' || repeat == 'Y');

  return 0;
}
