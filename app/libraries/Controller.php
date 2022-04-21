<?php

class Controller {
  public function model($model) {
    require_once('../app/models/' . $model . '.php');

    return new $model();
  }

  public function view($view, $datas = []) {
    if(file_exists('../app/views/' . $view . '.html.php')) {
      extract($datas);
      
      ob_start();
      require('../app/views/' . $view . '.html.php');
      $content = ob_get_clean();
      require('../app/views/template.html.php');
    }
  }
}
