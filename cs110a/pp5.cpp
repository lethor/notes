/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 2

   This is a computerized version of the game Rock-Paper-Scissors.
*/

#include <iostream>
using namespace std;

char input(int player); // Asks the user for input, and returns the result.
void output(char& one, char& two); // Displays a message based on the outcome.

int main()
{
  char one, two;
  int player;

  cout << "Rock-Paper-Scissors has begun.\n";

  one = input(1);
  two = input(2);
  output(one, two);

  return 0;
}

char input(int player) // Asks the user for input, and returns a character.
{                     // Precondition: <player> must be 1 or 2.
  char choice;       // Postcondition: <choice> must be r, p, or s.

  do
  {
    cout << "Player " << player << ", make your move: ";
    cin >> choice;

    switch(choice)
    {
      case 'r': case 'R':
        choice = 'r';
        return choice;
        break;
      case 'p': case 'P':
        choice = 'p';
        return choice;
        break;
      case 's': case 'S':
        choice = 's';
        return choice;
        break;
      default:
        cout << "Please enter R, P, or S.\n";
        break;
    }
  } while(1 == 1);
}

void output(char& one, char& two) // Displays a message based on the outcome.
                                 // Precondition: (one && two) == (r || p || s)
{
  if((one == 'r' && two == 's') || (two == 'r' && one == 's'))
    cout << "Rock breaks scissors.\n\n";
  else if((one == 'p' && two == 'r') || (two == 'p' && one == 'r'))
    cout << "Paper covers rock.\n\n";
  else if((one == 's' && two == 'p') || (two == 's' && one == 'p'))
    cout << "Scissors cut paper.\n\n";
  else
    cout << "It's a draw.\n\n";
}
