<?php


require_once("bootstrap.php");


require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




function inviaNotifica($message, $status = 0, $send = true) {
    
    global $dbh;
    $dbh->insertNotifica($_SESSION["idvenditore"],$message,$status);
    $mail = new PHPMailer(true);
    if($send) {
        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "rolando220567190@gmail.com";
            $mail->Password = "fhkilqfvygexuxty";
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('rolando220567190@gmail.com', 'Squola');
            $mail->addAddress('rolando220567190@gmail.com');

            $mail->Subject = 'Un aggiornamento da Squola';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            error_log("Failed to send email ".$e);
        }
    }
}


if (
    isset($_POST["usernuovovenditore"]) && isset($_POST["passnuovovenditore"]) && isset($_POST["nomenuovovenditore"])  && isset($_POST["indirizzonuovovenditore"])
) {
    if (strlen($_POST["usernuovovenditore"]) > 0 && strlen($_POST["passnuovovenditore"]) > 0 && strlen($_POST["nomenuovovenditore"]) > 0  && strlen($_POST["indirizzonuovovenditore"]) > 0) {

        $uservenditore = htmlspecialchars(($_POST["usernuovovenditore"]));
        $passvenditore = htmlspecialchars(($_POST["passnuovovenditore"]));
        $nomevenditore = htmlspecialchars(($_POST["nomenuovovenditore"]));
        $indirizzovenditore = htmlspecialchars(($_POST["indirizzonuovovenditore"]));
        $attivovenditore = 1;
        $id = $dbh->registraVenditore($uservenditore, $passvenditore, $nomevenditore, $indirizzovenditore, $attivovenditore);
        $login_resultv = $dbh->checkLoginVenditore($_POST["usernuovovenditore"], $_POST["passnuovovenditore"]);
        if (count($login_resultv) != 0 && $id != false) {
            $msg = "Inserimento completato correttamente!";
            registerLoggedVenditore($login_resultv[0]);
        } else {
            $templateParams["errorenuovov"] = "Errore! Controllare username o password";
        }
    } else {
        $templateParams["errorenuovov"] = "Errore! Controllare username o password";
    }
} else if (
    isset($_POST["usernuovoutente"]) && isset($_POST["passnuovoutente"]) && isset($_POST["nomenuovoutente"])
) {
    if (strlen($_POST["usernuovoutente"]) > 0 && strlen($_POST["passnuovoutente"]) > 0 && strlen($_POST["nomenuovoutente"]) > 0) {

        $userutente = htmlspecialchars(($_POST["usernuovoutente"]));
        $passutente = htmlspecialchars(($_POST["passnuovoutente"]));
        $nomeutente = htmlspecialchars(($_POST["nomenuovoutente"]));
        $attivoutente = 1;
        $id = $dbh->registraUtente($userutente, $passutente, $nomeutente, $attivoutente);
        $login_resultu = $dbh->checkLoginUtente($_POST["usernuovoutente"], $_POST["passnuovoutente"]);
        if (count($login_resultu) != 0 && $id != false) {
            $msg = "Inserimento completato correttamente!";
            registerLoggedUtente($login_resultu[0]);
        } else {
            $templateParams["errorenuovou"] = "Errore! Controllare username o password";
        }
    } else {
        $templateParams["errorenuovou"] = "Errore! Controllare username o password";
    }
} else if (
    isset($_POST["uservenditore"]) && isset($_POST["passvenditore"])
) { 
    if (strlen($_POST["uservenditore"]) > 0 && strlen($_POST["passvenditore"]) > 0) {
       
        $login_resultv = $dbh->checkLoginVenditore($_POST["uservenditore"], $_POST["passvenditore"]);

        if (count($login_resultv) == 0) { 
            $templateParams["erroreloginv"] = "Errore! Controllare username o password";
        } else {

            registerLoggedVenditore($login_resultv[0]);
        }
    } else {
        $templateParams["erroreloginv"] = "Errore! Controllare username o password";
    }
} else if (
    isset($_POST["userutente"]) && isset($_POST["passutente"])
) {
    if (strlen($_POST["userutente"]) > 0 && strlen($_POST["passutente"]) > 0) { 
        $login_resultu = $dbh->checkLoginUtente($_POST["userutente"], $_POST["passutente"]);

        if (count($login_resultu) == 0) { 
            $templateParams["erroreloginu"] = "Errore! Controllare username o password";
        } else {

            registerLoggedUtente($login_resultu[0]);
        }
    } else {
        $templateParams["erroreloginu"] = "Errore! Controllare username o password";
    }
}



if (isVenditoreLoggedIn()) {
   
    $templateParams["titolo"] = 'Squola - Admin';
    $templateParams["nome"] = "login-home.php";
    $templateParams["prodotti"] = $dbh->getProdottiDiVenditoreId($_SESSION["idvenditore"]);
} else if (isUtenteLoggedIn()) {
    header("location: index.php");
} else {
    $templateParams["titolo"] = 'Squola - Login';
    $templateParams["nome"] = "login-form.php";
}



require("template/base.php");
