<?php
require_once("bootstrap.php");

if (!isVenditoreLoggedIn() || !isset($_POST["azione"])) {

    header("location: login.php");
}
 



if ($_POST["azione"] === '1') {
    header("location: index.php");
    $nomeprodotto = htmlspecialchars($_POST["nomeprodotto"]); 
    $prezzoprodotto = $_POST["prezzoprodotto"];
    $quantita = $_POST["quantitaprodotto"];
    $venditore = $_SESSION["idvenditore"];

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgprodotto"]);
    if($result != 0){
        $imgprodotto = $msg;
        $id = $dbh->insertProdotto($nomeprodotto, $prezzoprodotto, $imgprodotto, $venditore,$quantita);
        if($id!=false){
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoriaDiProdotto($id, $categoria);
            }
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
        
    }
    header("location: login.php?formmsg=".$msg);
}else if($_POST["azione"] == 2){  

    var_dump($_POST["quantitaprodotto"]);
    $nomeprodotto = htmlspecialchars($_POST["nomeprodotto"]);
    $prezzoprodotto = $_POST["prezzoprodotto"];
    $quantita = intval($_POST["quantitaprodotto"]);
    $idprodotto= $_POST["idprodotto"];
    $venditore = $_SESSION["idvenditore"];


    if(isset($_FILES["imgprodotto"]) && strlen($_FILES["imgprodotto"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgprodotto"]);
        if($result == 0){
            header("location: login.php?formmsg=".$msg);
        }
        $imgprodotto = $msg;
    }
    else{
        $imgprodotto = $_POST["oldimg"];
    }
    


    $dbh->updateProdottoDiVenditore($nomeprodotto, $prezzoprodotto, $imgprodotto, $idprodotto, $venditore, $quantita);
    

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }
    $categorievecchie = explode(",", $_POST["categorie"]);


    $categoriedaeliminare = array_diff($categorievecchie, $categorie_inserite);
    foreach($categoriedaeliminare as $categoria){
        $ris = $dbh->deleteCategoriaDiProdotto($idprodotto, $categoria);
    }
    $categoriedainserire = array_diff($categorie_inserite, $categorievecchie);
    foreach($categoriedainserire as $categoria){
        $ris = $dbh->insertCategoriaDiProdotto($idprodotto, $categoria);
    }

    $msg = "Modifica completata correttamente!";
    http_response_code(307);
    header("location: login.php?formmsg=".$msg);
}else if($_POST["azione"] == 3){
    header("location: index.php");
    echo "entro";
    $idprodotto = $_POST["idprodotto"];
    $venditore =  $_SESSION["idvenditore"];

    $dbh->deleteCategorieDiProdotti($idprodotto);
    $dbh->deleteProdottoDiVenditore($idprodotto, $venditore);
    
    $msg = "Cancellazione completata correttamente!";
    header("location: login.php?formmsg=".$msg);
}

?>

