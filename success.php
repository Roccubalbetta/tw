<?php




require_once("bootstrap.php");


require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




function inviaNotifica($message, $status = 0, $send = true) {
    
    global $dbh;
    $dbh->insertNotifica($_SESSION["idutente"],$message,$status);
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


if (isset($_POST["firstname"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["email"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["cardname"]) && isset($_POST["cardnumber"]) && isset($_POST["expmonth"]) && isset($_POST["expyear"]) && isset($_POST["cvv"])) {
    if (strlen($_POST["firstname"]) > 0 && strlen($_POST["address"]) > 0 && strlen($_POST["city"]) > 0 && strlen($_POST["email"]) > 0 && strlen($_POST["state"]) > 0 && strlen($_POST["zip"]) == 5 && strlen($_POST["cardname"]) > 0 && strlen($_POST["cardnumber"]) == 16 && strlen($_POST["expmonth"]) > 0 && strlen($_POST["expyear"]) == 4 && strlen($_POST["cvv"]) == 3) {
        $templateParams["titolo"] = 'Squola - Fine Transazione';
        $templateParams["prodotti"] = $dbh->getProdottoDaCarrelloeId($_SESSION["idutente"]);
        foreach($templateParams["prodotti"] as $prodotti){
            $dbh->ricalcoloQuantita($prodotti["qty"],$prodotti["idprodotto"]);
        }
        $dbh->svuotaCarrello($_SESSION["idutente"]);
        $templateParams["nome"] = "success.php";
    } else {
        $templateParams["nome"] = "pay.php";
        $templateParams["errorepay"] = "Errore! Inserisci tutti i dati";
    }
}

$templateParams["totale"] = $dbh->getTotale($_SESSION["idutente"]);
$templateParams["prodotti"] = $dbh->getProdottoDaCarrelloeId($_SESSION["idutente"]);


require("template/base.php");
