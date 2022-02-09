<section class="popular">
    <h2 class="heading">Prodotti</h2>
    <?php if (isset($templateParams["formmsg"])) : ?>
        <p><?= $templateParams["formmsg"]; ?></p>
    <?php endif; ?>
    <div class="changesdiv">
        <a class="changes" href="gestisci-prodotti.php?action=1">Inserisci Prodotti</a>
    </div>
    <div class="box-container">
        <?php foreach ($templateParams["prodotti"] as $prodotti) : ?>
            <?php if($prodotti["quantita"]==0) :?>
                <?php inviaNotifica($prodotti["nomeprodotto"]." Esaurito");?>
                <?php endif;?>
            <div class="box">
            <span class="price"><?= $prodotti["prezzoprodotto"] . "$"; ?></span>
                <img src="<?= UPLOAD_DIR . $prodotti["imgprodotto"]; ?>" alt="" />
                <h3><?= $prodotti["nomeprodotto"]; ?> <?= $prodotti["quantita"] ?></h3>
                <div> 
                    <a class="changes" href="gestisci-prodotti.php?action=2&id=<?= $prodotti["idprodotto"]; ?>">Modifica</a>
                </div>
                <div>
                    <a class="changes" href="gestisci-prodotti.php?action=3&id=<?= $prodotti["idprodotto"]; ?>">Cancella</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>