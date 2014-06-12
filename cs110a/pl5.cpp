/* Ben Thornton
   CS 110A
   Summer 2004
   Programming Lab 5

   Reads input from a text file.
   Counts the total number of words and characters.
   Displays the word count and the average number of characters per word.
   Extra Credit: Count the number of lines with content, and average the
   number of words per "non-empty" line.
*/

#include <iostream>
#include <fstream>
using namespace std;

void precision(int x);
void count(int& words, int& chars, int& lines, ifstream& file_in);
bool letter(char &c);
void out(int& words, int& chars, int& lines);

int main()
// Opens a file, then calls the other functions.
{
  ifstream file_in;

  char fi[33];
  int words = 0, chars = 0, lines = 0;

  cout << "\nPlease enter the filename: ";
  cin >> fi;
  file_in.open(fi);
  if(file_in.fail())
  {
    cout << "Error opening the file \"" << fi << "\".\n";
    exit(1);
  }

  count(words, chars, lines, file_in);
  precision(2);
  out(words, chars, lines);

  return 0;
}

void precision(int x)
// Specifies the number of digits displayed after a decimal point.
// Precondition: x must be an integer >= 0.
// Postcondition: none.
{
  cout.setf(ios::showpoint);
  cout.setf(ios::fixed);
  cout.precision(x);
}

void count(int& words, int& chars, int& lines, ifstream& file_in)
// Reads characters and counts the number of letters and words.
// Precondition: words, cpw, & file_in must be available
// Postcondition: words, chars & lines must be positive integers
{
  char c, d;

  while(!file_in.eof())
  {
    file_in.get(c);
    if(letter(c))
      words++;
    while(!file_in.eof() && letter(c))
    {
      chars++;
      file_in.get(c);
    }
    if(c == '\n' && d != '\n')
      lines++;
    d = c;
  }

}

bool letter(char &c)
// Checks to see if a character qualifies as a letter.
// Precondition: c must contain a character value
// Postcondition: function returns a Boolean value
{
  switch(c)
  {
    case '.': case ',': case ' ': case '\t': case '\n':
      return false;
      break;
    default:
      return true;
      break;
  }
}

void out(int& words, int& chars, int& lines)
// Displays the total number of words in the file,
// and the average number of characters per word.
// Precondition: words, chars & lines must be declared.
// Postcondition: none
{
  double cpw = chars / double(words);
  double wpl = words / double(lines);

  cout << "This file contains " << chars << " characters in " << words
    << " words on " << lines << " lines.\n"
    << "The average line length is " << wpl << " words.\n"
    << "The average word length is " << cpw << " characters.\n\n";
}
