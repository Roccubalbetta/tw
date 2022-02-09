<section class="home" id="home">
    <div class="content">
      <h1>Uno Zaino Infinito</h1>
      <p>
        Dimenticato qualcosa? Ordinalo e arriverà nel giro di pochi minuti
      </p>
    </div>

    <div class="image">
      <img src="<?= UPLOAD_DIR . "delivery.svg" ?>" alt="" />
    </div>
  </section>

  <img class="wave" src="<?= UPLOAD_DIR . "wave.svg" ?>" alt="" />

<section class="speciality" id="prodotti">
  <h2 class="heading">Cosa Abbiamo</h2>
  <div class="box-conteiner">
    <?php foreach ($templateParams["categorie"] as $categorie) : ?>

      <div class="box">
        <a href="<?= $categorie["nomecategoria"].".php" ?>">
          <img class="image" src="<?= UPLOAD_DIR . $categorie["imgslide"]; ?>" alt="link alla pagina.<?=$categorie["nomecategoria"]?>" />
          <div class="content">
            <img src="<?= UPLOAD_DIR . $categorie["imgcategoria"]; ?>" alt="" />
            <span><?= $categorie["nomecategoria"]; ?></span>
          </div>
        </a>
      </div>

    <?php endforeach; ?>

  </div>
</section>
<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>"  alt=""/>

  <section class="steps">
    <?php foreach ($templateParams["steps"] as $steps) : ?>

      <div class="box">
        <img src="<?= UPLOAD_DIR . $steps["imgstep"]; ?>" alt="" />
        <h3><?= $steps["nomestep"]; ?></h3>
      </div>

    <?php endforeach; ?>
    </section>