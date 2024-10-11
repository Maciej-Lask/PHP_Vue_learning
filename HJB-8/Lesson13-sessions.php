<?php

session_start(); 

if (isset($_POST['submit'])) {
  $username = filter_input(
    INPUT_POST,
    'username',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  $password = $_POST['password'];

  if ($username == 'john' && $password == '123') {
    $_SESSION['username'] = $username;
    header('Location: /HJB-8/extras/dashboard.php');
  } else {
    echo 'Incorrect username';
  }
}
?>

  <form action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
  ); ?>" method="POST">
    <div>
      <label>Username: </label>
      <input type="text" name="username">
    </div>
    <br>
    <div>
      <label>Password: </label>
      <input type="password" name="password">
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
