<?php

class Page extends Controller {
  public function __construct() {
    $this->pizzaModel = $this->model('PizzaModel');
  }

  public function index() {
    $pizzas = $this->pizzaModel->find();
    $this->view('pizza/pizzas', ['title' => 'Accueil', 'pizzas' => $pizzas]);
  }
}
