<?php



require_once("bootstrap.php");



if(!isUtenteLoggedIn()){
    header("location: login.php");
}



if($_GET["action"]==1){

    $dbh->insertProdottoInCarrello($_GET["id"],$_SESSION["idutente"]);
         header("location: carrello.php");
       
}

if($_GET["action"]==2){

        $dbh->deleteProdottoInCarrello($_GET["id"],$_SESSION["idutente"]);

        header("location: carrello.php");


}

if($_GET["action"]==3){

    $dbh->addProdottoInCarrello($_GET["id"],$_SESSION["idutente"]);

    header("location: carrello.php");


}

if($_GET["action"]==4){

    $dbh->removeProdottoInCarrello($_GET["id"],$_SESSION["idutente"]);

    header("location: carrello.php");


}

?>