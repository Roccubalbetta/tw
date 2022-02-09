<section class="popular">
    <div class="box-container">
        <div class="paybox">

            <div class="row">
                <div class="col-75">
                    <div class="paycontainer">
                        <form action="success.php" method="POST">
                            <?php if (isset($templateParams["errorepay"])) : ?>
                                <p><?php echo $templateParams["errorepay"]; ?></p>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-50">
                                    <h1>Dati Compratore</h1>
                                    <label for="fname"><em class="fa fa-user"></em> Nome</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Nome Cognome">
                                    <label for="email"><em class="fa fa-envelope"></em> Email</label>
                                    <input type="text" id="email" name="email" value="<?= $_SESSION["userutente"] ?>">
                                    <label for="adr"><em class="fa fa-address-card-o"></em> Indirizzo</label>
                                    <input type="text" id="adr" name="address" value="Via Cesare Pavese, 50">
                                    <label for="city"><em class="fa fa-institution"></em> City</label>
                                    <input type="text" id="city" name="city" value="Cesena">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="state">Stato</label>
                                            <input type="text" id="state" name="state" value="IT">
                                        </div>
                                        <div class="col-50">
                                            <label for="zip">CAP</label>
                                            <input type="text" id="zip" name="zip" value="47521">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-50">
                                    <h1>Payment</h1>
                                    <div>Carte accettate</div>
                                    <div class="icon-container">
                                        <em class="fas fa-credit-card"></em>
                                        <em class="fas fa-credit-card"></em>
                                        <em class="fas fa-credit-card"></em>
                                        <em class="fas fa-credit-card"></em>
                                    </div>
                                    <label for="cname">Nome sulla Carta</label>
                                    <input type="text" id="cname" name="cardname" placeholder="Nome e Cognome">
                                    <label for="ccnum">Numero carta (16 numeri)</label>
                                    <input type="text" id="ccnum" name="cardnumber">
                                    <label for="expmonth">Mese di Scadenza</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="Nome del mese">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Anno di scadenza</label>
                                            <input type="text" id="expyear" name="expyear" placeholder="anno">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="---">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="submit" value="Paga" class="pay">
                        </form>
                    </div>
                </div>

                <div class="col-25">
                    <div class="paycontainer">
                        <h2>Cart
                        </h2>
                        <?php foreach ($templateParams["prodotti"] as $prodotti) : ?>
                            <p><?= $prodotti["nomeprodotto"] ?><span class="price"><?= $prodotti["prezzoprodotto"] ?>$ x <?= $prodotti["qty"] ?></span></p>
                        <?php endforeach; ?>
                        <hr>
                        <?php

                        $totale = getTotale($templateParams["totale"]);
                        ?>
                        <p>Total <span class="price" style="color:black"><?= $totale ?>$</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>