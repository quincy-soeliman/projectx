<?php

class Database {

  private $db;
  private $db_settings = [
    'db_type' => 'mysql',
    'db_host' => 'localhost',
    'db_name' => 'projectx',
    'db_user' => 'root',
    'db_pass' => '',
  ];

  public function connect() {
    try {
      // Creates new PDO object
      $this->db = new PDO(
        $this->db_settings['db_type'] .
        ':host=' . $this->db_settings['db_host'] .
        ';dbname=' . $this->db_settings['db_name'],
        $this->db_settings['db_user'],
        $this->db_settings['db_pass']);

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
