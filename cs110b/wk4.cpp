/* Ben Thornton
   CS 110B
   Spring 2005
   Week 4 Exercise

   Initialize three character variables using only a pointer.
*/

#include <iostream>
using namespace std;

int main()
{
  char m, n, o, *p;

  p = &m;
  *p = 'a';

  p = &n;
  *p = 'b';

  p = &o;
  *p = 'c';

  return 0;
}
