<?php

class Database {

  private $db;

  public function connect() {
    try {
      $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' .
        DB_NAME, DB_USER, DB_PASS);

      return $this->db;
    } catch (PDOException $e) {
      print "Error: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function disconnect() {
    $this->db = null;
  }

}
