<?php

class Pizza extends Controller {
  public function index() {
    $datas = [
      'email' => '',
      'title' => '',
      'ingredients' => '',
      'imgUrl' => '',
    ];

    $this->view('pizza/add', ['title' => 'Add', 'datas' => $datas]);
  }

  public function find() {
    $this->view('pizza/pizzas');
  }

  public function create() {
    $datas = [
      'title' => 'Add',
      'email' => '',
      'title' => '',
      'ingredients' => '',
      'imgUrl' => '',
    ];

    if($_POST['submit']) {
      $allowedExt = ['jpg', 'jpeg', 'png'];

      // Upload File
      if(!empty($_FILES['imgUrl']['name'])) {
        $fileName = $_FILES['imgUrl']["name"];
        $fileSize = $_FILES['imgUrl']["size"];
        $fileTmp = $_FILES['imgUrl']["tmp_name"];
        
        $targetdDir = APPROOT . "/uploads/${fileName}";
        $fileExt = explode('.', $fileName);
        $fileExt = strtolower(end($fileExt));

        if(in_array($fileExt, $allowedExt)) {
          if($fileSize <= 1000000) {
            move_uploaded_file($fileTmp, $targetdDir);
          } else {
            $datas['imgUrl'] = 'File too large';
          }
        } else {
          $datas['imgUrl'] = 'Invalid file type';
        }
      } else {
        $datas['imgUrl'] = 'Invalid file type';
      }
    }

    $this->view('pizza/add', ['title' => 'Add', 'datas' => $datas]);
  }
}
