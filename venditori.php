<?php


require_once("bootstrap.php");


$templateParams["titolo"] = 'Squola - Venditori';
$templateParams["nome"] = "Venditori.php";
$templateParams["venditori"] = $dbh->getVenditori();


require("template/base.php");

?>