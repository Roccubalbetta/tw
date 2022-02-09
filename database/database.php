<?php


//ci serve in tutte le pagine quindi lo andiamo a mettere nel bootstrap

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        //connessione al database w3school PHP Connect
        //acceddo alla proprietà (db senza dollaro) della variabile $DB ($this)
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connessione al db fallita");
        }
    }

    public function getCategories(){
        //creo lo statement
        $stmt = $this->db->prepare("SELECT idcategoria, nomecategoria, imgcategoria, imgslide
        FROM categoria ORDER BY idcategoria");
        //faccio il binding dei parametri in questo caso non ce ne sono
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSteps(){
        //creo lo statement
        $stmt = $this->db->prepare("SELECT idstep, nomestep, imgstep
        FROM steps ORDER BY idstep");
        //faccio il binding dei parametri in questo caso non ce ne sono
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registraVenditore($uservenditore, $passvenditore, $nomevenditore, $indirizzovenditore, $attivovenditore){
        $query = "INSERT INTO venditore (uservenditore, passvenditore, nomevenditore, indirizzovenditore, attivo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssi',$uservenditore, $passvenditore, $nomevenditore, $indirizzovenditore, $attivovenditore);
        return $stmt->execute();
    }

    public function registraUtente($userutente, $passutente, $nomeutente, $attivoutente){
        $query = "INSERT INTO utente (userutente, passutente, nomeutente, attivo) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi',$userutente, $passutente, $nomeutente, $attivoutente);
        return $stmt->execute();
    }


    public function getProdottiPerCategoria($n){
        // trova tutti i ptodotti di una certa categoria
        $stmt = $this->db->prepare("SELECT idprodotto, nomeprodotto, prezzoprodotto, imgprodotto, quantita, venditore, nomevenditore, idvenditore
        FROM prodotto , prodotto_ha_categoria , venditore WHERE categoria = ? AND venditore=idvenditore AND idprodotto=prodotto");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getVenditori(){
        // trova tutti i ptodotti di una certa categoria
        $stmt = $this->db->prepare("SELECT idvenditore, nomevenditore, uservenditore FROM venditore ORDER BY idvenditore");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getVenditoreById($n){
        // trova tutti i ptodotti di una certa categoria
        $stmt = $this->db->prepare("SELECT DISTINCT idvenditore, nomevenditore, uservenditore, nomeprodotto, nomecategoria
        FROM venditore , prodotto , prodotto_ha_categoria, categoria WHERE idvenditore = ? AND venditore=idvenditore AND prodotto=idprodotto AND categoria=idcategoria");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function checkLoginVenditore($username, $password){
        $query= "SELECT idvenditore, passvenditore, uservenditore FROM venditore WHERE attivo=1
        AND uservenditore=? AND passvenditore=?";
        $stmt= $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        $result =$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLoginUtente($username, $password){
        $query= "SELECT idutente, passutente, userutente FROM utente WHERE attivo=1
        AND userutente=? AND passutente=?"; 
        $stmt= $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        $result =$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdottiDiVenditoreId($id){
        $query = "SELECT idprodotto, nomeprodotto, imgprodotto, quantita, prezzoprodotto FROM prodotto WHERE venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdottoDaIdeVenditore($idprodotto, $idvenditore){
        $query = "SELECT idprodotto, nomeprodotto, imgprodotto, prezzoprodotto, quantita, (SELECT GROUP_CONCAT(categoria) FROM prodotto_ha_categoria WHERE prodotto=idprodotto GROUP BY prodotto) as categorie FROM prodotto WHERE idprodotto=? AND venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idvenditore);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function insertProdotto($nomeprodotto, $prezzoprodotto, $imgprodotto, $venditore, $quantita){
        $query = "INSERT INTO prodotto (nomeprodotto, prezzoprodotto, imgprodotto, venditore, quantita) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssii',$nomeprodotto, $prezzoprodotto, $imgprodotto, $venditore,$quantita);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateProdottoDiVenditore($nomeprodotto, $prezzoprodotto, $imgprodotto, $idprodotto, $venditore, $quantita){
        $query = "UPDATE prodotto SET nomeprodotto = ?, prezzoprodotto = ?, imgprodotto = ?, quantita=? WHERE idprodotto = ? AND venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sisiii',$nomeprodotto, $prezzoprodotto, $imgprodotto,$quantita, $idprodotto, $venditore,);
        return $stmt->execute();
    }

    public function deleteProdottoDiVenditore($idprodotto, $venditore){
        $query = "DELETE FROM prodotto WHERE idprodotto = ? AND venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $venditore);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function insertCategoriaDiProdotto($prodotto, $categoria){
        $query = "INSERT INTO prodotto_ha_categoria (prodotto, categoria) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$prodotto, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoriaDiProdotto($prodotto, $categoria){
        $query = "DELETE FROM prodotto_ha_categoria WHERE prodotto = ? AND categoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$prodotto, $categoria);
        return $stmt->execute();
    }

    public function deleteCategorieDiProdotti($prodotto){
        $query = "DELETE FROM prodotto_ha_categoria WHERE prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$prodotto);
        return $stmt->execute();
    }


    public function insertProdottoInCarrello($idprodotto, $idutente){
        $query = "INSERT INTO utente_ha_prodotto (prodotto, utente, qty) VALUES (?, ?, 1)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idutente);
        return $stmt->execute();
    }

    public function deleteProdottoInCarrello($idprodotto, $idutente){
        $query = "DELETE FROM utente_ha_prodotto WHERE prodotto = ? AND utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idutente);
        return $stmt->execute();
    }

    public function getProdottoDaCarrelloeId($idutente){
        $query = "SELECT idprodotto, nomeprodotto, imgprodotto, prezzoprodotto, qty, quantita FROM prodotto, utente_ha_prodotto WHERE utente=? AND prodotto=idprodotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idutente);
        $stmt->execute();
        $result = $stmt->get_result();
       
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addProdottoInCarrello($idprodotto,$idutente){
        $query = "UPDATE utente_ha_prodotto SET qty=qty+1 WHERE prodotto=? AND utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idutente);
        return $stmt->execute();
    }

    public function removeProdottoInCarrello($idprodotto,$idutente){
        $query = "UPDATE utente_ha_prodotto SET qty=qty-1 WHERE prodotto=? AND utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idprodotto, $idutente);
        return $stmt->execute();
    }

    public function getTotale($idutente){
        $query = "SELECT SUM(prezzoprodotto * qty) as totale FROM prodotto, utente_ha_prodotto WHERE utente=? AND prodotto=idprodotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idutente);
        $stmt->execute();
        $result = $stmt->get_result();
       
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminaVenditore($idvenditore, $uservenditore){
        $query = "DELETE FROM venditore WHERE idvenditore = ? AND uservenditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is',$idvenditore, $uservenditore);
        return $stmt->execute();
    }

    public function eliminaUtente($idutente, $userutente){
        $query = "DELETE FROM utente WHERE idutente = ? AND userutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is',$idutente, $userutente);
        return $stmt->execute();
    }

    public function ricalcoloQuantita($qty,$idprodotto){
        $query = "UPDATE prodotto SET quantita=quantita-? WHERE idprodotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$qty, $idprodotto);
        return $stmt->execute();

    }

    public function insertNotifica($user, $message, $status){ 
    $query = "INSERT INTO `notifica` (`idutente`, `message`, `status`) VALUES (?,?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isi", $user,$message,$status);
        return $stmt->execute();
    }

    public function svuotaCarrello($idutente){
        $query = "DELETE FROM utente_ha_prodotto WHERE utente = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idutente);
        return $stmt->execute();

    }

    
}
?>