<?php

$numbers = [1, 2, 3, 4, 5];
$colors = ['red', 'blue', 'green'];
echo $numbers[0];
echo $numbers[3] + $numbers[4];

var_dump($numbers);


$colors = [
    1 => 'red',
    2 => 'green',
    3 => 'blue',
];

$hex = [
    'red' => '#f00',
    'green' => '#0f0',
    'blue' => '#00f',
];

echo $hex['red'];
var_dump($hex);


$person1 = [
    'first_name' => 'Brad',
    'last_name' => 'Traversy',
    'email' => 'brad@gmail.com',
];

$people = [
    $person1,
    [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@gmail.com',
    ],
    [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@gmail.com',
    ],
];
echo "<br>";
echo "<br>";
var_dump($people);
echo "<br>";
echo "<br>";

echo $people[0]['first_name'];
echo $people[2]['email'];

var_dump(json_encode($people));

$jsonobj = '{"first_name":"Brad","last_name": "Traversy","email":"brad@gmail.com"}';
var_dump(json_decode($jsonobj));
