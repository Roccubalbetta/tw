<?php



require_once("bootstrap.php");



//logica
if (isUtenteLoggedIn()) {
    $templateParams["titolo"] = 'Squola - Payment';
    $templateParams["nome"] = "pay.php";
    $templateParams["totale"] = $dbh->getTotale($_SESSION["idutente"]);
    $templateParams["prodotti"] = $dbh->getProdottoDaCarrelloeId($_SESSION["idutente"]);
} else {
    header("location: index.php");
}



require("template/base.php");
?>