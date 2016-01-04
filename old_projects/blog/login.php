<?php

session_start();
session_destroy();

// Turn off at flight
error_reporting(E_ALL);

require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new User();
  $user->login($username, $password);
}

?>

<form action="login.php" method="post">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="username" placeholder="Username" required>
  </div>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>

<?php include_once 'templates/footer.php'; ?>
