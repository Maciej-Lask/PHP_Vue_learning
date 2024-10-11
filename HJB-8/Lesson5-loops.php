<?php



for ($x = 0; $x <= 10; $x++) {
  echo "Number: $x <br>";
}


$x = 1;

while ($x <= 5) {
  echo "Number: $x <br>";
  $x++;
}

do {
  echo "Number: $x <br>";
  $x++;
} while ($x <= 5);


$numbers = [1, 2, 3, 4, 5];

foreach ($numbers as $x) {
  echo "Number: $x <br>";
}


$posts = ['Post One', 'Post Two', 'Post Three'];

foreach ($posts as $index => $post) {
  echo "${index} - ${post} <br>";
}


$person = [
  'first_name' => 'Brad',
  'last_name' => 'Traversy',
  'email' => 'brad@gmail.com',
];

foreach ($person as $key => $val) {
  echo "${key} - ${val} <br>";
}
