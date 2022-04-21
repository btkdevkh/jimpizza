<?php

class PizzaModel {
  protected $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function find() {
    $this->db->query('SELECT * FROM pizza');
    return $this->db->resultSet();
  }
}
