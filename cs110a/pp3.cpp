/* Ben Thornton
   CS 110A
   Summer 2004
   Practice Problem 3

   This program calculates the average number of Muni
   passengers riding the K-Ingleside line per day,
   based on input from the user.
*/

#include <iostream>
using namespace std;

int main()
{
  double peoplePerWeek, peoplePerDay = 0;

  cout << "\nHow many people rode the K-Ingleside\n"
       << "Muni line this past workweek (M-F)?\n\n--> ";

  cin >> peoplePerWeek;

  if (peoplePerWeek >= 0)
  {
    peoplePerDay = peoplePerWeek/5;
    cout << endl
         << "That's "
         << peoplePerDay
         << " people per day, on average.\n\n";
  }
  else
    cout << "\nNegative people don't exist. Goodbye.\n\n";

  return 0;
}
