<?php

// Turn off at flight
error_reporting(E_ALL);

require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  echo $username;

  $user = new User();
  $user->create($username, $password, $first_name, $last_name);
  die();
}

?>

<form action="register.php" method="post">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="username" placeholder="Username" required>
  </div>
  
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="first_name">First name:</label>
    <input type="text" class="form-control" name="first_name" placeholder="Peter" required>
  </div>

  <div class="form-group">
    <label for="last_name">Last name:</label>
    <input type="text" class="form-control" name="last_name" placeholder="Griffin" required>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>

<?php include_once 'templates/footer.php'; ?>
