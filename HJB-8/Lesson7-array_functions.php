<?php

$fruits = ['apple', 'banana', 'orange'];

echo count($fruits);

echo in_array('banana', $fruits);

$fruits[] = 'grape';
array_push($fruits, 'mango', 'raspberry');
array_unshift($fruits, 'kiwi'); // Adds to the beginning

array_pop($fruits); // Removes last
array_shift($fruits); // Removes first

unset($fruits[2]);

// Split into chunks of x
$chunkedArray = array_chunk($fruits, 2);
var_dump($chunkedArray);

$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$arr3 = array_merge($arr1, $arr2);
var_dump($arr3);
$arr4 = [...$arr1, ...$arr2]; 
var_dump($arr4);

$a = ['green', 'red', 'yellow'];
$b = ['avocado', 'apple', 'banana'];

$c = array_combine($a, $b);

$keys = array_keys($c);

$flipped = array_flip($c);
var_dump($flipped);

$numbers = range(1, 20);

$newNumbers = array_map(function ($number) {
  return "Number ${number}";
}, $numbers);

echo "<br><br>";

$lessThan10 = array_filter($numbers, fn($number) => $number < 10);

$sum = array_reduce($numbers, fn($carry, $number) => $carry + $number);
var_dump($sum);
