<?php

if (isset($_POST['submit'])) {
  // echo '<h3>' . $GET['username'] . '</h3>';
  echo '<h3>' . $_POST['username'] . '</h3>';
  echo '<h3>' . $_POST['age'] . '</h3>';
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