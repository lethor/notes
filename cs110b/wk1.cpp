/* Ben Thornton
   CS 110B
   Spring 2005

   Week 1 Mandatory Assignment
   Chapter 4, Exercise 13
*/

#include <iostream>
using namespace std;

int main()
{
  int temp;

  cout << "\nEnter a temperature, in degrees Fahrenheit: ";
  cin >> temp;

  /*
   *  Temp:  Chemical:  Name:           State Change:
   *  -----------------------------------------------
   *   676   Hg         Mercury         Boiling
   *   212   H2O        Water           Boiling
   *   172   C2H5OH     Ethyl Alcohol   Boiling
   *    32   H2O        Water           Freezing
   *   -38   Hg         Mercury         Freezing
   *  -173   C2H5OH     Ethyl Alcohol   Freezing
   *  -306   O2         Oxygen          Boiling
   *  -362   O2         Oxygen          Freezing
   */

  cout << "\nAt " << temp << " degrees ";

  if(temp > 676)
    cout << "oxygen, alcohol, water and mercury boil.\n\n";
  else if(temp > 212)
    cout << "oxygen, alcohol and water boil.\n\n";
  else if(temp > 172)
    cout << "oxygen and alcohol boil.\n\n";
  else if(temp > 32)
    cout << "oxygen boils.\n\n";
  else if(temp > -38)
    cout << "oxygen boils. Water freezes.\n\n";
  else if(temp > -173)
    cout << "oxygen boils. Water and mercury freeze.\n\n";
  else if(temp > -306)
    cout << "oxygen boils. Water, mercury and alcohol freeze.\n\n";
  else if(temp > -362)
    cout << "Water, mercury and alcohol freeze.\n\n";
  else
    cout << "water, mercury, alcohol, and even oxygen freezes.\n\n";
}
