<?php


$age = 20;

if ($age >= 18) {
    echo 'You are old enough to vote!';
} else {
    echo 'Sorry, you are too young to vote.';
}

$t = date('H');

if ($t < 12) {
    echo 'Have a good morning!';
} elseif ($t < 17) {
    echo 'Have a good afternoon!';
} else {
    echo 'Have a good evening!';
}

$posts = [];

if (!empty($posts[0])) {
    echo $posts[0];
} else {
    echo 'There are no posts';
}


echo !empty($posts[0]) ? $posts[0] : 'There are no posts';

$firstPost = !empty($posts[0]) ? $posts[0] : 'There are no posts';

$firstPost = !empty($posts[0]) ? $posts[0] : null;

$firstPost = $posts[0] ?? null;

var_dump($firstPost);


$favcolor = 'red';

switch ($favcolor) {
    case 'red':
        echo 'Your favorite color is red!';
        break;
    case 'blue':
        echo 'Your favorite color is blue!';
        break;
    case 'green':
        echo 'Your favorite color is green!';
        break;
    default:
        echo 'Your favorite color is not red, blue, nor green!';
}
