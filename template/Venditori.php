<section class="venditori" id="venditori">
    <h2 class="heading">I Nostri Venditori</h2>
    <div class="box-container">
        <?php foreach ($templateParams["venditori"] as $venditori) : ?>
            <div class="box">
                    <h3><?= $venditori["nomevenditore"]; ?></h3>
                    <div>
                        <p>Email: <?= $venditori["uservenditore"]; ?> </p>
                    </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>
<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>" alt=""/>