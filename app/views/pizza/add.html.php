<section class="grey-text">
  <h2 class="center">Add Pizza</h2>
  <form action="<?= URLROOT ?>/pizza/create" method="POST" enctype="multipart/form-data">
    <label>Your Email:</label>
    <input type="text" name="email" value="<?= $datas['email'] ?? null ?>">
    <p class="error"><?= $datas['emailErr'] ?? null ?></p>

    <label>Pizza Title:</label>
    <input type="text" name="title" value="<?= $datas['title'] ?? null ?>">
    <p class="error"><?= $datas['titleErr'] ?? null ?></p>

    <label>Ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?= $datas['ingredients'] ?? null ?>">
    <p class="error"><?= $datas['ingredientsErr'] ?? null ?></p>

    <div class="file-field input-field">
      <div class="btn">
        <span>Image</span>
        <input type="file" name="imgUrl">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path <?= !empty($datas['imgUrlErr']) ? 'invalid' : 'validate' ?>" type="text">
      </div>
      <p class="error"><?= $datas['imgUrlErr'] ?? null ?></p>
    </div>
    
    <div class="center">
      <input type="submit" value="Add Pizza" name="submit" class="btn z-depth-0">
    </div>
  </form>
</section>
