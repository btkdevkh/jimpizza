<?php

class PizzaModel {
  protected $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function find() {
    $this->db->query('SELECT * FROM pizza ORDER BY createdAt DESC');
    return $this->db->resultSet();
  }

  public function findOne($id) {
    $this->db->query('SELECT * FROM pizza WHERE id = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function create($email, $title, $ingredients, $imgUrl) {
    $this->db->query('INSERT INTO pizza (email, title, ingredients, imgUrl) VALUES (:email, :title, :ingredients, :imgUrl)');
    $this->db->bind(':email', $email);
    $this->db->bind(':title', $title);
    $this->db->bind(':ingredients', $ingredients);
    $this->db->bind(':imgUrl', $imgUrl);

    $this->db->execute();
  }

  public function deleteOne($id) {
    $this->db->query('DELETE FROM pizza WHERE id = :id');
    $this->db->bind(':id', $id);

    $this->db->execute();
  }
}
