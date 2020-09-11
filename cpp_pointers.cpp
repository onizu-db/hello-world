// dConsoleApp.cpp : This file contains the 'main' function. Program execution begins and ends there.
//

#include <iostream>

int main()
{
    std::cout << "Hello World!\n";

	int var = 10;
	std::cout << "&var = " << &var << std::endl << std::endl;

	int *ptr = &var;

	std::cout << "ptr = " << ptr << std::endl; // prints address of var (&var)
	std::cout << "&ptr = " << &ptr << std::endl; // prints different address
	std::cout << "*ptr = " << *ptr << std::endl; // prints value

	*ptr = 20;

	std::cout << *ptr << std::endl;

	int **ptr2 = &ptr;
	std::cout << **ptr2 << std::endl << std::endl; // prints value at address stored by *ptr

	**ptr2 = 30;
	std::cout << **ptr2 << std::endl;
	std::cout << *ptr << std::endl; 
	std::cout << var << std::endl;
	
}

// Run program: Ctrl + F5 or Debug > Start Without Debugging menu
// Debug program: F5 or Debug > Start Debugging menu

// Tips for Getting Started: 
//   1. Use the Solution Explorer window to add/manage files
//   2. Use the Team Explorer window to connect to source control
//   3. Use the Output window to see build output and other messages
//   4. Use the Error List window to view errors
//   5. Go to Project > Add New Item to create new code files, or Project > Add Existing Item to add existing code files to the project
//   6. In the future, to open this project again, go to File > Open > Project and select the .sln file
