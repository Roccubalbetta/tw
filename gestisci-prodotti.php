<?php


require_once("bootstrap.php");



if(!isVenditoreLoggedIn() || !isset($_GET["action"]) || ($_GET["action"]!=1 && $_GET["action"]!=2 && $_GET["action"]!=3) || ($_GET["action"]!=1 && !isset($_GET["id"]))){
    header("location: login.php");
}


if($_GET["action"]!=1){
    $risultato = $dbh->getProdottoDaIdeVenditore($_GET["id"],$_SESSION["idvenditore"]);
    if(count($risultato)==0){
        $templateParams["prodotto"]= NULL;
    }else{
        $templateParams["prodotto"]=$risultato[0];
        $templateParams["prodotto"]["categorie"] = explode(",", $templateParams["prodotto"]["categorie"]); 


    }
}else{
    $templateParams["prodotto"]= getProdottoVuoto();
}





$templateParams["titolo"] = "Squola - Gestisci prodotto";
$templateParams["nome"] = "admin-form.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["azione"] = $_GET["action"];



require("template/base.php");


?>