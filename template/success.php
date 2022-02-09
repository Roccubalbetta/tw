<section class="venditori">
    <div class="box-container">
        <form class="form" action="index.php" method="POST">
            <h2>Pagamento avvenuto con successo</h2>
            <?php inviaNotifica("L'ordine e' partito!!");?>
                    <input class="invia" type="submit" name="submit" value="Torna alla home" />
        </form>
    </div>
</section>

<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>" alt =""/>
