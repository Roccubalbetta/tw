<?php

$prodotto = $templateParams["prodotto"];
$azione = getAction($templateParams["azione"]); // non l'ho passato al template ma è globale quindi ok

?>

<section class="venditori">
    <div class="box-container">
        <form class="form" action="processa-prodotto.php" method="POST" enctype="multipart/form-data">
            <h2><?= $azione ?> Prodotto</h2>
            <?php if ($prodotto == null) : ?>
                <p> Prodotto non trovato </p>
            <?php else : ?>
                <ul>
                    <li>
                        <label for="nomeprodotto">Nome: </label><input type="text" id="nomeprodotto" name="nomeprodotto" value="<?= $prodotto["nomeprodotto"] ?>" />
                    </li>
                    <li>
                        <label for="prezzoprodotto">Prezzo: </label><input type="text" id="prezzoprodotto" name="prezzoprodotto" value="<?= $prodotto["prezzoprodotto"] ?>" />
                    </li>
                    <li>
                        <label for="quantitaprodotto">Quantità: </label><input type="text" id="quantitaprodotto" name="quantitaprodotto" value="<?= $prodotto["quantita"] ?>" />
                    </li>
                    <li>
                        <?php
                        // mostrare immagine già caricata per modifica e cancellazione
                        if ($templateParams["azione"] != 3) : ?>
                            <label for="imgprodotto" class="custom-file-upload"><em class="fa fa-cloud-upload"></em> Immagine prodotto</label><input type="file" name="imgprodotto" id="imgprodotto" />
                        <?php endif; ?>

                        <?php if ($templateParams["azione"] != 1) : ?>
                            <img id="changeimage" src="<?= UPLOAD_DIR . $prodotto["imgprodotto"]; ?>" alt="" />
                        <?php endif; ?>

                    </li>
                    <li class="checkbox">
                        <?php foreach ($templateParams["categorie"] as $categoria) : ?>
                            <input type="checkbox" id="<?= $categoria["idcategoria"]; ?>" name="categoria_<?= $categoria["idcategoria"]; ?>" 
                            <?php if ($templateParams["azione"] != 1) : ?> <?php if (in_array($categoria["idcategoria"], $prodotto
                            ["categorie"])) {
                                echo ' checked="checked" ';
                                }
                            ?> <?php endif; ?> />

                            <label for="<?= $categoria["idcategoria"]; ?>"><?= $categoria["nomecategoria"]; ?></label>
                        <?php endforeach; ?>
                    </li>
                    <li class="liaction">
                        <input class="invia" type="submit" name="submit" value="<?= $azione; ?>" />
                        <div class="annulladiv">
                            <a class="annulla" href="login.php">Annulla</a>
                        </div>
                    </li>
                </ul>
                <?php if ($templateParams["azione"] != 1) : ?>
                    <input name="idprodotto" type="hidden" value="<?= $prodotto["idprodotto"]; ?>" />
                    <input name="categorie" type="hidden" value="<?= implode(",", $prodotto["categorie"]); ?>" />
                    <input name="oldimg" type="hidden" value="<?= $prodotto["imgprodotto"]; ?>" />
                    <input name="quantita" type="hidden" value="<?= $prodotto["quantita"]; ?>" />
                <?php endif; ?>
                <input name="azione" type="hidden" value="<?= $templateParams["azione"]; ?>" />
            <?php endif; ?>
        </form>
    </div>
</section>

<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>" alt=""/>