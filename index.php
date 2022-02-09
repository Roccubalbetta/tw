<?php



require_once("bootstrap.php");


$templateParams["titolo"] = 'Squola - Home';
$templateParams["nome"] = "home.php";
$templateParams["categorie"]= $dbh->getCategories();
$templateParams["steps"]= $dbh->getSteps();


require("template/base.php");

?>