<?php

class Article
{
  private $db;

  private $id;
  private $title;
  private $content;
  private $author;
  private $created_at;
  private $updated_at;

  public function __construct($user)
  {
    $this->author = $user;

    $this->db = new Database();
    $this->db->connect();
  }

  public function create()
  {
    $sql = 'INSERT INTO articles';
    $stmt = $this->db->prepare($sql);
  }

  public function update()
  {

  }

  public function delete()
  {

  }

  public function render_products() {

  }

  public function render_products_form() {

  }
}
