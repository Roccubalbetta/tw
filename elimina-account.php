<?php


require_once("bootstrap.php");

if (isset($_SESSION["idvenditore"])) {
    $dbh->eliminaVenditore($_SESSION["idvenditore"], $_SESSION["uservenditore"]);
}

if (isset($_SESSION["idutente"])) {
    $dbh->eliminaUtente($_SESSION["idutente"], $_SESSION["userutente"]);
}

$templateParams["titolo"] = 'Squola - Home';
$templateParams["nome"] = "logout.php";


require("template/base.php");
