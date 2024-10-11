<?php

$name = 'Brad';
$age = 40; 
$hasKids = true; 
$cashOnHand = 10.5; 

var_dump($cashOnHand);


echo "$name is $age years old";

// deprecated
echo "${name} is ${age} years old";

echo $name . ' is ' . $age . ' years old';


echo '<h3>' . $name . ' is ' . $age . ' years old</h3>';


echo 5 + 5;
echo 10 - 6;
echo 5 * 10;
echo 10 / 2;

define('HOST', 'localhost');
define('USER', 'root');

var_dump(HOST);
