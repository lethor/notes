/* Ben Thornton
   CS 110B
   Spring 2005
   Week 5 Extra Credit

   1. Prompt for five integers.
   2. Navigate array using pointer notation.
   3. Output largest value.
*/

#include <iostream>
using namespace std;

int main()
{
  int nums[5], big;

  for (int i = 0; i < 5; i++)
  {
    cout << i + 1 << ". Please enter an integer: ";
    cin >> *(nums + i);
    if (*(nums + i) > big)
      big = *(nums + i);
  }

  cout << "The largest number you entered was " << big << endl;

  return 0;
}
