/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 3

   Draw parallelograms.
*/

#include <iostream>
using namespace std;

char in(char& pix, int& dim);      // Gets description, returns by reference.
void solid(char& pix, int& dim);  // Draws a solid parallelogram.
void empty(char& pix, int& dim); // Draws an empty parallelogram.

int main()
{
  char pix, pref;
  int dim;

  pref = in(pix, dim);

  if(pref == 'y' || pref == 'Y') // For some reason, both
    solid(pix, dim);            // Y & N produce solid
  else                         // parallelograms.
    empty(pix, dim);          // Go figure.

  return 0;
}

char in(char& pix, int& dim) // Gets description, returns by reference.
{                           // Precondition: pix, dim
  char pref;               // Postcondition: pix, dim ! null

  cout << endl;
  cout << "Please, enter a character: ";
  cin >> pix;
  cout << "...and a positive integer: ";
  cin >> dim;
  cout << "Do you want it filled in?  ";
  cin >> pref;
  cout << endl;

  return pref;
}

void solid(char& pix, int& dim)  // Draws a solid parallelogram.
{                               // Precondition: pix && dim != null
  int i, j;                    // Postcondition: none

  for(j = 1; j <= dim; j++)
  {
    for(i = 0; i < j; i++)
      cout << pix;
    cout << endl;
  }

  for(j = 1; j <= dim; j++)
  {
    for(i = 0; i < j; i++)
      cout << ' ';
    for(i = (dim - j); i > 0; i--)
      cout << pix;
    cout << endl;
  }

  return;
}

void empty(char& pix, int& dim)  // Draws an empty parallelogram.
{                               // Precondition: pix && dim != null
  int i, j;                    // Postcondition: none

  for(j = 1; j <= dim; j++)
  {
    for(i = 0; i < j; i++)
      if(i == 0 || i == j-1)
        cout << pix;
      else
        cout << ' ';
    cout << endl;
  }

  for(j = 1; j <= dim; j++)
  {
    for(i = 0; i < j; i++)
      cout << ' ';
    for(i = (dim - j); i > 0; i--)
      if(i == 1 || i == (dim - j))
        cout << pix;
      else
        cout << ' ';
    cout << endl;
  }

  return;
}
