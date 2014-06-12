/* Ben Thornton
   CS 110A
   Summer 2004
   Practice Problem 6

   This program asks the user to enter a word,
   then determines if the word has any consecutive
   identical letters, and reports this back.
*/

#include <iostream>

using namespace std;

bool in(char word[], int length);
void out(bool b, char word[], int length);

int main()
{
  const int length = 21;
  char word[length];

  out(in(word, length), word, length);

  return 0;
}

bool in(char word[], int length)
// Asks the user to enter a word, and performs the double letter test.
// Precondition: none
// Postconditions: word must contain at least a period,
//                 length must be a positive integral constant, and
//                 the function must return a Boolean value.
{
  bool b = false;

  cout << "\nThis program detects double letters in a word.\n";
  cout << "Your word may contain up to " << length << " letters.\n";
  cout << "Please enter your word, followed by a period: ";
  cin >> word[0];

  for(int i = 1; word[i-1] != '.' && i < length; i++)
  {
    cin >> word[i];
    if(i > 0 && word[i] == word[i-1])
      b = true;
  }

  return b;
}

void out(bool b, char word[], int length)
// Tells the user whether his or her word contains a double letter.
// Precondition: b, word, and length must contain the appropriate values
// Postcondition: none
{
  cout << "\"";
  for(int i = 0; word[i] != '.' && i < length; i++)
    cout << word[i];
  cout << "\"";

  if(b)
    cout << " contains a double letter.\n\n";
  else
    cout << " does not contain a double letter.\n\n";
}
