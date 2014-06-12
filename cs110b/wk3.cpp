/* Ben Thornton
   CS 110B
   Spring 2005

   Week 3 Mandatory Assignment
   Chapter 7, Exercise 2

   Calculate annual rainfall.
*/

#include <iostream>
using namespace std;

int main()
{
  int i;
  float month[12], total = 0, average, min[2] = {-1, 3.4E38}, max[2] = {-1, 0};

  cout << "\nFor each month, please enter the amount of rainfall in inches.\n";

  for(i = 0; i < 12; i++)
  {
    cout << "Month " << i + 1 << ": ";
    cin >> month[i];

    while(month[i] < 0) {
      cout << "Rain doesn't fall up. Try again: ";
      cin >> month[i];
    }

    total += month[i];

    if(month[i] < min[1]) {
      min[0] = i + 1;                //  Set month.
      min[1] = month[i];            //   Set rainfall.
    }

    if(month[i] > max[1]) {
      max[0] = i + 1;                //  Set month.
      max[1] = month[i];            //   Set rainfall.
    }
  }

  average = total / 12;

  cout << "\nAnnual Rainfall Statistics\n--------------------------\n";
  cout << "Total: " << total << "\"\n";
  cout << "Average: " << average << "\"\n";
  cout << "Least: " << min[1] << "\" in month " << min[0] << "\n";
  cout << "Most: " << max[1] << "\" in month " << min[0] << "\n\n";

  return 0;
}
