/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 2

   This program converts a distance expressed in meters
   to it's approximate equivalent in feet and inches.
*/

#include <iostream>
using namespace std;

const double fpm = 3.28;

double input(); // Asks user to input a distance in meters
void convert(double& m, int& f, double& i); // Converts metric to english
void output(int& f, double& i); // Displays result in feet and inches
void repeat(char& rpt); // Allows program repetition

int main()
{
  double m, i;
  int f;
  char rpt;

  cout << "\nThis program converts meters to feet and inches.\n";

  do
  {
    m = input();
    convert(m, f, i);
    output(f, i);
    repeat(rpt);
  }while(rpt == 'y' || rpt == 'Y');

  cout << "Goodbye.\n\n";

  return 0;
}

double input() // Asks user to input a distance in meters
{
  double meters;
  cout << "Please enter a distance in meters: ";
  cin >> meters;
  return meters;
}

void convert(double& m, int& f, double& i) // Converts metric to english
{
  double ed;          // a variable to store the english decimal value
  ed = m * fpm;       // convert meters to feet
  f = int(ed);        // extract the number of whole feet
  i = (ed - f) * 12;  // express decimal value in inches
  return;
}

void output(int& f, double& i) // Displays result in feet and inches
{
  cout << "That's the same as " << f << " feet and "
       << i << " inches.";
  return;
}

void repeat(char& rpt) // Allows program repetition
{
  cout << endl << "One more time? ";
  cin >> rpt;

  while(rpt != 'y' && rpt != 'Y' &&
        rpt != 'n' && rpt != 'N')
  {
    cout << "Invalid entry. Please enter Y or N: ";
    cin >> rpt;
  }
  return;
}
