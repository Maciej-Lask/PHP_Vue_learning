

<?php
/* --- Sanitizing Inputs -- */
// filter_input() - Sanitize inputs

// FILTER_SANITIZE_STRING - Convert string to string with only alphanumeric, whitespace, and the following characters - _.:/
// FILTER_SANITIZE_EMAIL - Convert string to a valid email address
// FILTER_SANITIZE_URL - Convert string to a valid URL
// FILTER_SANITIZE_NUMBER_INT - Convert string to an integer
// FILTER_SANITIZE_NUMBER_FLOAT - Convert string to a float
// FILTER_SANITIZE_FULL_SPECIAL_CHARS - HTML-encodes special characters, keeps spaces and most other characters

if (isset($_POST['submit'])) {
  echo '<h3>' .   filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '</h3>';
  echo '<h3>' .   filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT) . '</h3>';
} ?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>?username=Brad">Link</a>


<br><br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div>
    <label>Name: </label>
    <input type="text" name="username">
  </div>
  <br>
  <div>
    <label>Age: </label>
    <input type="number" name="age">
  </div>
  <br>
  <input type="submit" name="submit" value="Submit">
</form>