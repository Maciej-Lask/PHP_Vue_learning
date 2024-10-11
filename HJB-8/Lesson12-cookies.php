<?php

// Set a cookie
setcookie('name', 'Brad', time() + 86400 * 30);
setcookie('lastname', 'Traversy', time() + 86400 * 30);


// Get a cookie
if (isset($_COOKIE['name'])) {
  echo $_COOKIE['name'];
}

// Delete a cookie
setcookie('name', '', time() - 86400);
setcookie('lastname', '', time() - 86400);
