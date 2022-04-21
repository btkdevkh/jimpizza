<section>
  <h4 class="center gret-text">Nos Pizzas</h4>
  <div class="row">
    <?php foreach($pizzas as $pizza ) : ?>
      <div class="col s12 m6">
        <div class="card">
          <div class="card-content center">
            <img src="<?= URLROOT . '/uploads/' . htmlspecialchars($pizza->imgUrl) ?>" class="responsive-img circle" />
            <h5><?= htmlspecialchars($pizza->title) ?></h5>
            <ul>
              <?php foreach(explode(',', $pizza->ingredients) as $ingr) : ?>
                <li>* <?= htmlspecialchars($ingr) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <a href="<?= URLROOT ?>/pizza/show/<?= $pizza->id ?>">Details</a>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
</section>
