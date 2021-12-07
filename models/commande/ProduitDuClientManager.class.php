<?php
require_once "models/Model.class.php";
require_once "models/commande/ProduitDuClient.class.php";

class ProduitDuClientManager extends Model{
    private $ProduitDuClient;//tableau de produitDuClient

   
    public function ajoutProduitDuClientBd($titre,$prix,$nombre){
        $req = "
        INSERT INTO produitduclient (titre, prix, nombre)
        values (:titre, :prix, :nombre)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_INT);
        $stmt->bindValue(":nombre",$nombre,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $produitDuClient = new ProduitDuClient($this->getBdd()->lastInsertId(),$titre,$prix,$nombre);
           
        }        
    }

    

            
  
}
?>