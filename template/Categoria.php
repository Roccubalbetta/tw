<section class="popular" id="popular">
  <div class="box-container">
    <?php foreach ($templateParams["prodotti"] as $prodotti) : ?>
      <div class="box">
        <span class="price"><?= $prodotti["prezzoprodotto"] . "$"; ?></span>
        <img src="<?= UPLOAD_DIR . $prodotti["imgprodotto"]; ?>" alt="<?= $prodotti["nomeprodotto"]; ?>" />
        <h3><?= $prodotti["nomeprodotto"]; ?>
          <?php if ($prodotti["quantita"] == 0) : ?>
            Esaurito
          <?php endif; ?>
        </h3>
        <div>
          <p>Venditore: <?= $prodotti["nomevenditore"]; ?> </p>
        </div>
        <?php if ($prodotti["quantita"] > 0) : ?>
        <a href="processa-carrello.php?action=1&id=<?= $prodotti["idprodotto"]; ?>" class="btn">Aggiungi al carrello</a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<img class="wave" src="<?= UPLOAD_DIR . "wave.svg" ?>"  alt="" />

<section class="speciality" id="prodotti">
  <h2 class="heading">Cosa Abbiamo</h2>
  <div class="box-conteiner">
    <?php foreach ($templateParams["categorie"] as $categorie) : ?>

      <div class="box">
        <a href="<?= $categorie["nomecategoria"] . ".php" ?>">
          <img class="image" src="<?= UPLOAD_DIR . $categorie["imgslide"]; ?>" alt="<?= $categorie["nomecategoria"] ?>" />
          <div class="content">
            <img src="<?= UPLOAD_DIR . $categorie["imgcategoria"]; ?>" alt="" />
            <h3><?= $categorie["nomecategoria"]; ?></h3>
          </div>
        </a>
      </div>

    <?php endforeach; ?>

  </div>
</section>
<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>"  alt=""/>