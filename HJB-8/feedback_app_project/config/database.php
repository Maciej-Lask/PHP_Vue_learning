<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'maciej');
// var_dump(DB_USER);
define('DB_PASS', '123456');
define('DB_NAME', 'php_dev');


try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // echo 'Connection successful!';
    }
} catch (Exception $th) {
    echo 'Connection failed: ' . $th->getMessage();
}
