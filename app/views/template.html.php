<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="<?= URLROOT ?>/css/style.css">
  <title><?= SITENAME . ' | ' . $title ?></title>
</head>
<body class="grey lighten-4">
  <nav class="teal z-depth-0">
    <div class="container">
      <a class="brand" href="<?= URLROOT ?>">Pizza</a>
      <ul class="right hide-on-small-and-down">
        <li class="btn z-depth-0"><a href="<?= URLROOT ?>/pizza/index">Add Pizzas</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <?= $content ?>
  </div>
</body>
</html>
