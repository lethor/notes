/* Ben Thornton
   CS 110B
   Spring 2005

   Week 2 Mandatory Assignment
   Chapter 6, Exercise 7

   Track fluctuations in population.
*/

#include <iostream>
using namespace std;

void input(int& num, int min);

int main()
{
  int pop = 0, years = 0, birth = -1, death = -1, dead, i;
  float bRate, dRate;

  cout << "\nWhat is the current population? ";
  input(pop, 2);
  cout << "What is the birth rate? ";
  input(birth, 0);
  cout << "What is the death rate? ";
  input(death, 0);
  cout << "Iterate for how many years? ";
  input(years, 1);

  bRate = float(birth) / 100;
  dRate = float(death) / 100;

  for(i = 1; i <= years; i++)
  {
    pop += (pop * bRate);
    dead = (pop * dRate);
    pop -= dead;
  }

  cout << "In " << years << " year(s), the population will be ";
  cout  << pop << ".\n\n";

  return 0;
}

void input(int& num, int min)
{
  cin >> num;

  while(num < min)
  {
    cout << "\nPlease enter a number greater than " << min << ": ";
    cin >> num;
  }
}
