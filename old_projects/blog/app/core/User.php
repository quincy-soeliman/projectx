<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->connect();
  }

  public function login($username, $password)
  {
    if (!empty($username) && !empty($password)) {
      $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_OBJ);

      if ($user) {
        $msg = 'Welcome ' . $user->first_name . ' ' . $user->last_name;
        $msg_type = 'success';
        header('Location: index.php?msg=' . $msg . '&msg_type=' . $msg_type);

        session_start();
        $_SESSION['user'] = $user->username;
        $_SESSION['role'] = $user->role;
        die();

      } else {
        $msg = "Username or password is incorrect.";
        $msg_type = 'error';
        header('location: login.php?msg=' . $msg . '&msg_type=' . $msg_type);
        die();
      }

    } else {
      $msg = 'Please fill in your username and password.';
      $msg_type = 'error';
      header('Location: login.php?msg=' . $msg . '&msg_type=' . $msg_type);
      die();
    }
  }

  public function create($username, $password, $first_name, $last_name)
  {
    if (!empty($username) && !empty('$password') && !empty($first_name) && !empty($last_name)) {
      $sql = 'INSERT INTO users
              (username, password, first_name, last_name)
              VALUES (:username, :password, :first_name, :last_name)';
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':first_name', $first_name);
      $stmt->bindParam(':last_name', $last_name);

      if ($stmt->execute()) {
        $msg = 'The user has been created successfully.';
        $msg_type = 'success';
        header('Location: register.php?msg=' . $msg . '&msg_type=' . $msg_type);
        die();

      } else {
        $msg = 'Something went wrong while creating the user. Please contact the administrator.';
        $msg_type = 'error';
        header('Location: register.php?msg=' . $msg . '&msg_type=' . $msg_type);
        die();
      }

    } else {
      $msg = 'Please fill in all the required fields';
      $msg_type = 'error';
      header('Location: register.php?msg=' . $msg . '&msg_type=' . $msg_type);
      die();
    }
  }

  public function update()
  {

  }

  public function delete()
  {

  }
}
