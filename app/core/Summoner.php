<?php

class Summoner {

  private $db;

  public function __construct() {
    $this->db = new Database();
    $this->db->connect();
  }

}
