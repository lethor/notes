/* Ben Thornton
   CS 110B
   Spring 2005

   Week 7 Mandatory Assignment
   Chapter 10, Exercise 3

   1. Prompt for soccer player stats (one for each team member).
   2. Store each player's name, number and points scored in a structure.
   3. Store all of the structures in an array.
   4. Calculate and display the total points scored, as well as the high scorer.
*/

#include <iostream>
using namespace std;

struct Player
{
  char name[32];      // Player's name
  int number;         // Player's number
  int points;         // Points scored
};

int main()
{
  Player team[3];    // An array to store the info about each player
  int total = 0;          // To store the total number of points for the team
  int mvp, high = 0;  // To store the high score, and the index for the player

  cout << "\nEnter player info for all twelve members of the soccer team:\n";

  // Loop through twelve times, each time prompting for the player's info.
  for (int i = 0; i < 3; i++)
  {
    cout << "\nPlayer #" << i + 1 << ":\n";
    cout << "  Name: ";
    cin >> team[i].name;
    cout << "  Number: ";
    cin >> team[i].number;

    while (team[i].number < 0)
    {
      cout << "  Please enter a positive number: ";
      cin >> team[i].number;
    }

    cout << "  Points Scored: ";
    cin >> team[i].points;

    while (team[i].points < 0)
    {
      cout << "  Please enter a positive number: ";
      cin >> team[i].points;
    }

    if (team[i].points >= high)
    {
      high = team[i].points;
      mvp = i;
    }

    total += team[i].points;
  }

  cout << "\nThe total number of points for the team is: " << total;
  cout << "\nThe high scorer was " << team[mvp].name << " with ";
  cout << team[mvp].points << " points.\n\n";

  return 0;
}
