<?php
session_start();

// Turn off at flight
error_reporting(E_ALL);

require_once 'app/init.php';
include_once 'templates/header.php';

if (!$_SESSION['role'] == 'authenticated' || !$_SESSION['role'] == 'administrator') {
  $msg = 'You have no rights to access this page';
  $msg_type = 'error';
  header('location: login.php?msg=' . $msg . '&msg_type=' . $msg_type);
}

print $_SESSION['user'];

?>



<?php include_once 'templates/footer.php'; ?>
