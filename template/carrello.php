<section class="popular">
  <h2 class="heading">Carrello di <?= $_SESSION["userutente"]; ?></h2>
  <?php if (count($templateParams["prodotti"]) == 0) : ?>
    <h2 class="heading">Nessun prodotto nel carrello</h2>
  <?php endif; ?>
  <div class="box-container">
    <?php foreach ($templateParams["prodotti"] as $prodotti) : ?>
      <div class="box">
        <span class="price"><?= $prodotti["prezzoprodotto"] . "$"; ?></span>
        <img src="<?= UPLOAD_DIR . $prodotti["imgprodotto"]; ?>" alt="" />
        <h3><?= $prodotti["nomeprodotto"]; ?></h3>
        <div>
          <?php if ($prodotti["qty"] > 1) : ?>
              <a class="pm" href="processa-carrello.php?action=4&id=<?= $prodotti["idprodotto"]; ?>"> - </a>
          <?php endif; ?>
          <label class="qty" for="<?= $prodotti["idprodotto"]; ?>">Quantità:</label><input class="counter" type="number" id="<?= $prodotti["idprodotto"]; ?>" name="qty" value="<?= $prodotti["qty"] ?>" min="0" max="<?= $prodotti["quantita"]?>" />
          <?php if ($prodotti["qty"] < $prodotti["quantita"]) : ?>
            <a class="pm" href="processa-carrello.php?action=3&id=<?= $prodotti["idprodotto"]; ?>"> + </a>
            <?php endif; ?>
          
        </div>
        <a class="btn" href="processa-carrello.php?action=2&id=<?= $prodotti["idprodotto"]; ?>">Togli dal carrello</a>
      </div>
    <?php endforeach; ?>
    <?php

    $totale = getTotale($templateParams["totale"]);
    ?>

    <div class="totale"> Totale: <?= $totale; ?>$</div>

    <a class="pay" href="pay.php">Paga Ora</a>
  </div>

    

</section>





<img class="wave" src="<?= UPLOAD_DIR . "wave.svg" ?>" alt=""/>
<section class="speciality" id="prodotti">
  <h2 class="heading">Cosa Abbiamo</h2>
  <div class="box-conteiner">
    <?php foreach ($templateParams["categorie"] as $categorie) : ?>

      <div class="box">
        <a href="<?= $categorie["nomecategoria"] . ".php" ?>">
          <img class="image" src="<?= UPLOAD_DIR . $categorie["imgslide"]; ?>" alt="link alla pagina.<?=$categorie["nomecategoria"]?>" />
          <div class="content">
            <img src="<?= UPLOAD_DIR . $categorie["imgcategoria"]; ?>" alt="" />
            <h3><?= $categorie["nomecategoria"]; ?></h3>
          </div>
        </a>
      </div>

    <?php endforeach; ?>

  </div>
</section>
<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>" alt=""/>