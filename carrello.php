<?php


require_once("bootstrap.php");


if (isUtenteLoggedIn()) {
    $templateParams["titolo"] = "Squola - Carrello";
    $templateParams["nome"] = "carrello.php";
    $templateParams["categorie"] = $dbh->getCategories();
    $templateParams["totale"] = $dbh->getTotale($_SESSION["idutente"]);
    $templateParams["prodotti"] = $dbh->getProdottoDaCarrelloeId($_SESSION["idutente"]);
} else{
    header("location: login.php");
}


require("template/base.php");


?>