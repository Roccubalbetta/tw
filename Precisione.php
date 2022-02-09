<?php



require_once("bootstrap.php");

$templateParams["titolo"] = 'Squola - Precisione';
$templateParams["nome"] = "Categoria.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProdottiPerCategoria(2);



require("template/base.php");

?>