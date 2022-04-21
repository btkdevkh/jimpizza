<section>
  <h4 class="center gret-text"></h4>
  <div class="row">
    <div class="col s12 m12">
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
        <div class="card-action">
          <a href="<?= URLROOT ?>">Retour</a>
          <a href="<?= URLROOT ?>/pizza/remove/<?= $pizza->id ?>" onclick="return confirm('Voulez-vous supprimer ce pizza ?')">Supprimer</a>
        </div>
      </div>
    </div>
  </div>
</section>
