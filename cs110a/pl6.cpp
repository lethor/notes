/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 6

   1. User enters someone's full name (first middle last).
   2. The first letter of each word gets capitalized.
   3. The middle name gets truncated to a single letter.
   4. Full name is displayed in the format "Last, First M."
   5. if(surname == "Bush"), ask if related to the president.
   Extra Credit: store full name in a two-dimensional array.
*/

#include <iostream>
#include <cstring>
#include <cctype>

using namespace std;

void in(char name[][3], int length);
void format(char name[][3]);
void out(char name[][3], int length);

int main()
{
  const int length = 20;
  char name[length+1][3];

  in(name, length);
  format(name);
  out(name, length);

  return 0;
}

void in(char name[][3], int length)
{
  int i=0, j=0;

  cout << endl << "Please enter your full name: ";

  do
  {
    cin >> name[i][j];

    while(name[i][j] != '\0' && i < length)
    {
      i++;
      cin.get(name[i][j]);
      if(name[i][j] == ' ' || name[i][j] == '\n')
        name[i][j] = '\0';
    }

    j++;
    i = 0;

  } while(j < 3);

  return;
}

void format(char name[][3])
{
  for(int i=0; i<3; i++)
    name[0][i] = toupper(name[0][i]);

  name[1][1] = '\0';

  return;
}

void out(char name[][3], int length)
{
  char l[5];

  for(int i=0; name[i][2] != '\0' && i < length; i++)
    cout << name[i][2];

  cout << ", ";

  for(int i=0; name[i][0] != '\0' && i < length; i++)
    cout << name[i][0];

  cout << " ";

  for(int i=0; name[i][1] != '\0' && i < length; i++)
    cout << name[i][1];

  cout << ".\n";

  for(int i=0; i<5; i++)
    l[i] = name[i][2];

  if(l[0]=='B' && l[1]=='u' && l[2]=='s' && l[3]=='h' && l[4]=='\0')
    cout << "Are you related to the president?\n\n";

  return;
}
