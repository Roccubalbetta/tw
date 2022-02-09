<?php

require_once("bootstrap.php");

$templateParams["titolo"] = 'Squola - Altro';
$templateParams["nome"] = "Categoria.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProdottiPerCategoria(4);


require("template/base.php");

?>