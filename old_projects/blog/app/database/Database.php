<?php

class Database
{
  private $db;

  private $db_info = [
    'db_type' => 'mysql',
    'db_host' => 'localhost',
    'db_name' => 'blog',
    'db_user' => 'root',
    'db_pass' => '',
  ];

  public function connect()
  {
    try {
      $this->db = new PDO($this->db_info['db_type'] . ':host=' . $this->db_info['db_host'] . ';dbname=' . $this->db_info['db_name'], $this->db_info['db_user'], $this->db_info['db_pass']);
      return $this->db;
    } catch (PDOException $e) {
      print "Error: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function disconnect()
  {
    $this->db = null;
  }
}
