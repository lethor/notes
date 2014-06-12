/* Ben Thornton
   CS 110A
   Summer 2004
   Practice Problem 4

   This tracks fluctuations in the local
   jackalope population.
*/

#include <iostream>
using namespace std;

const float births = 0.03, deaths = 0.01;

int iterate(int pop, int gen);

int main()
{
  int pop, gen;
  char repeat;

  do
  {
    cout << "\nHow many jackalopes are there? ";
    cin >> pop;
    cout << "Iterate how many generations? ";
    cin >> gen;

    cout << "In " << gen << " generation(s), the jackalope "
         << "population will change from " << pop << " to ";
    pop = iterate(pop, gen);
    cout  << pop << ".";

    cout << endl << "One more time? ";
    cin >> repeat;

    while(repeat != 'y' && repeat != 'Y' &&
          repeat != 'n' && repeat != 'N')
    {
      cout << "Invalid entry. Please enter Y or N: ";
      cin >> repeat;
      cout << endl;
    }
  }while(repeat == 'y' || repeat == 'Y');

  return 0;
}

int iterate(int pop, int gen)
{
  int opo, i = 1;

  while(i <= gen)
  {
    pop += (pop * births);
    opo = (pop * deaths);
    pop -= opo;
    i++;
  }

  return pop;
}

/* Sample Output:
bash-2.04$ a.out

How many jackalopes are there? 200
Iterate how many generations? 1
In 1 generation(s), the jackalope population will change from 200 to
204.
One more time? y

How many jackalopes are there? 132
Iterate how many generations? 2
In 2 generation(s), the jackalope population will change from 132 to
137.
One more time? n
*/
