<?php

echo 'Hello';
echo 123;
echo '<h1>Hello</h1>';

print 'Hello';

print_r('Hello');
print_r([1, 2, 3]);

var_dump('Hello');
var_dump([1, 2, 3]);

echo "Is your name O\'reilly?";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Website</title>
</head>

<body>
    <h1>Hello <?php echo 'Brad'; ?></h1>
    <h1>Hello <?= 'Brad' ?></h1>
</body>

</html>