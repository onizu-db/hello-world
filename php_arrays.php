<?php

$array = []; // Create empty array

var_dump($array); 
echo "-----\n";

$array = ['abc']; // Assign the value ['abc'] (array with one element 0 => 'abc' to $array)

var_dump($array);
echo "-----\n";

$array[] = 'abc'; // Add a new element 'abc' to the array

var_dump($array);
echo "-----\n";

$array += [0 => 'NEWabc', 4 => 'anotherABC']; // Concats two arrays, but the key [0] is already existing in the left-handside array so it ignores the first value from the right hand side array and only adds the second element (key 4 is not existing)

var_dump($array);
