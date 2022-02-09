<?php



require_once("bootstrap.php");


$templateParams["titolo"] = 'Squola - Quaderni';
$templateParams["nome"] = "Categoria.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProdottiPerCategoria(3);



require("template/base.php");

?>