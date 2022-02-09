<section class="venditori">
    <div class="box-container">
        <form class="form" action="#" method="POST">
            <h2>Login Venditore</h2>
            <?php if (isset($templateParams["erroreloginv"])) : ?>
                <p><?php echo $templateParams["erroreloginv"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="uservenditore">Username: </label><input type="text" id="uservenditore" name="uservenditore" />
                </li>
                <li>
                    <label for="passvenditore">Password: </label><input type="password" id="passvenditore" name="passvenditore" />
                </li>
                <li>
                    <input class="invia" type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>

        <form class="form" action="#" method="POST">
            <h2>Login Utente</h2>
            <?php if (isset($templateParams["erroreloginu"])) : ?>
                <p><?php echo $templateParams["erroreloginu"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="userutente">Username: </label><input type="text" id="userutente" name="userutente" />
                </li>
                <li>
                    <label for="passutente">Password: </label><input type="password" id="passutente" name="passutente" />
                </li>
                <li>
                    <input class="invia" type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>

        <form class="form" action="#" method="POST">
            <h2>Nuovo Venditore</h2>
            <?php if (isset($templateParams["errorenuovov"])) : ?>
                <p><?php echo $templateParams["errorenuovov"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="usernuovovenditore">Username: </label><input type="text" id="usernuovovenditore" name="usernuovovenditore" />
                </li>
                <li>
                    <label for="passnuovovenditore">Password: </label><input type="password" id="passnuovovenditore" name="passnuovovenditore" />
                </li>
                <li>
                    <label for="nomenuovovenditore">Nome: </label><input type="text" id="nomenuovovenditore" name="nomenuovovenditore" />
                </li>
                <li>
                    <label for="indirizzonuovovenditore"> Indirizzo: </label><input type="text" id="indirizzonuovovenditore" name="indirizzonuovovenditore" />
                </li>
                <li>
                    <input class="invia" type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>        

        <form class="form" action="#" method="POST">
            <h2>Nuovo Utente</h2>
            <?php if (isset($templateParams["errorenuovou"])) : ?>
                <p><?php echo $templateParams["errorenuovou"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="usernuovoutente">Username: </label><input type="text" id="usernuovoutente" name="usernuovoutente" />
                </li>
                <li>
                    <label for="passnuovoutente">Password: </label><input type="password" id="passnuovoutente" name="passnuovoutente" />
                </li>
                <li>
                    <label for="nomenuovoutente">Nome: </label><input type="text" id="nomenuovoutente" name="nomenuovoutente" />
                </li>
                <li>
                    <input class="invia" type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>        
    </div>
</section>
<img src="<?= UPLOAD_DIR . "bottomwave.svg" ?>" alt=""/>