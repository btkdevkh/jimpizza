<?php

require_once(APPROOT . '/helpers/fileUploader.php');

class Pizza extends Controller {
  public function __construct() {
    $this->pizzaModel = $this->model('PizzaModel');
  }

  public function index($id = null) {
    $pizza = $id !== null ? $this->pizzaModel->findOne($id) : null;

    $datas = [
      'email' => $pizza->email ?? '',
      'title' => $pizza->title ?? '',
      'ingredients' => $pizza->ingredients ?? '',
      'imgUrl' => $pizza->imgUrl ?? '',
      'emailErr' => '',
      'titleErr' => '',
      'ingredientsErr' => '',
      'imgUrlErr' => '',
    ];

    $this->view('pizza/add', ['title' => $id ? 'Update' : 'Add', 'id' => $id, 'datas' => $datas]);
  }

  public function find() {
    $pizzas = $this->pizzaModel->find();
    $this->view('pizza/pizzas', ['title' => 'Pizzas', 'pizzas' => $pizzas]);
  }

  public function show($id) {
    $pizza = $this->pizzaModel->findOne($id);
    $this->view('pizza/details', ['title' => 'Details', 'pizza' => $pizza]);
  }

  public function create() {
    $datas = [
      'email' => $_POST['email'] ?? '',
      'title' => $_POST['title'] ?? '',
      'ingredients' => $_POST['ingredients'] ?? '',
      'imgUrl' => $_FILES['imgUrl']['name'] ?? '',
      'emailErr' => '',
      'titleErr' => '',
      'ingredientsErr' => '',
      'imgUrlErr' => '',
    ];

    if(isset($_POST['submit'])) {
      if(empty($_POST['email'])) {
        $datas['emailErr'] = 'Email required';
      }
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $datas['emailErr'] = 'Email is not valid';
      }
      if(empty($_POST['title']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['title'])) {
        $datas['titleErr'] = 'Title required & letter and space only';
      }
      if(empty($_POST['ingredients']) || !preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $_POST['ingredients'])) {
        $datas['ingredientsErr'] = 'Ingredients required & must be comma separated';
      }

      // Imgae Upload
      $fileUploaded = fileUploader($_FILES);
      $datas['imgUrlErr'] = $fileUploaded;

      if(
        empty($datas['emailErr']) && 
        empty($datas['titleErr']) && 
        empty($datas['ingredientsErr']) && 
        empty($datas['imgUrlErr'])
      ) {
        $this->pizzaModel->create($datas['email'], $datas['title'], $datas['ingredients'], $datas['imgUrl']);

        header('Location:' . URLROOT);
      }
    }
    
    $this->view('pizza/add', ['title' => 'Add', 'datas' => $datas]);
  }

  public function update($id) {
    $pizza = $id !== null ? $this->pizzaModel->findOne($id) : null;

    $datas = [
      'email' => $_POST['email'] ?? '',
      'title' => $_POST['title'] ?? '',
      'ingredients' => $_POST['ingredients'] ?? '',
      'imgUrl' => $_FILES['imgUrl']['name'] ?? '',
      'emailErr' => '',
      'titleErr' => '',
      'ingredientsErr' => '',
      'imgUrlErr' => '',
    ];

    if(isset($_POST['submit'])) {
      if(empty($_POST['email'])) {
        $datas['emailErr'] = 'Email required';
      }
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $datas['emailErr'] = 'Email is not valid';
      }

      if(empty($_POST['title']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['title'])) {
        $datas['titleErr'] = 'Title required & letter and space only';
      }
      if(empty($_POST['ingredients']) || !preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $_POST['ingredients'])) {
        $datas['ingredientsErr'] = 'Ingredients required & must be comma separated';
      }

      // If reupload image
      if(!empty($_FILES['imgUrl']['name'])) {
        unlink("../public/uploads/" . $pizza->imgUrl);

        $fileUploaded = fileUploader($_FILES);
        $datas['imgUrlErr'] = $fileUploaded;
      } else {
        $datas['imgUrl'] = $pizza->imgUrl;
      }

      if(
        empty($datas['emailErr']) && 
        empty($datas['titleErr']) && 
        empty($datas['ingredientsErr']) && 
        empty($datas['imgUrlErr'])
      ) {
        var_dump($datas['imgUrl']);
        $this->pizzaModel->updateOne($id, $datas['email'], $datas['title'], $datas['ingredients'], $datas['imgUrl']);

        header('Location:' . URLROOT);
      }
    }
    
    $this->view('pizza/add', ['title' => 'Update', 'id' => $id, 'datas' => $datas]);
  }

  public function remove($id) {
    $pizza = $this->pizzaModel->findOne($id);
    unlink("../public/uploads/" . $pizza->imgUrl);
    header('Location:' . URLROOT);
    $this->pizzaModel->deleteOne($id);
  }
}
