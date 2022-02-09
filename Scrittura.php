<?php



require_once("bootstrap.php");

$templateParams["titolo"] = 'Squola - Scrittura';
$templateParams["nome"] = "Categoria.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProdottiPerCategoria(1);



require("template/base.php");

?>