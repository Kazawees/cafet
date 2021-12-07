<?php
require_once "models/Model.class.php";
require_once "models/produit/Produit.class.php";

class ProduitManager extends Model{
    private $produits;//tableau de produit

    public function ajoutProduit($produit){
        $this->produits[] = $produit;
    }

    public function getProduits(){
        return $this->produits;
    }

    public function chargementProduits(){
        $req = $this->getBdd()->prepare("SELECT * FROM produits");
        $req->execute();
        $mesProduits = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesProduits as $produit){
            $l = new Produit($produit['id'],$produit['titre'],$produit['prix'],$produit['image']);
            $this->ajoutProduit($l);
        }
    }

    public function getProduitById($id){
        for($i=0; $i < count($this->produits);$i++){
            if($this->produits[$i]->getId() === $id){
                return $this->produits[$i];
            }
        }
        throw new Exception("le produit n'existe pas !");
    }

    public function ajoutProduitBd($titre,$prix,$image){
        $req = "
        INSERT INTO produits (titre, prix, image)
        values (:titre, :prix, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $produit = new Produit($this->getBdd()->lastInsertId(),$titre,$prix,$image);
            $this->ajoutProduit($produit);
        }        
    }

    public function suppressionProduitBd($id){
        $req = "
        Delete from produits where id = :idProduit
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idProduit",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $produit = $this->getProduitById($id);
            unset($produit);

        }
    }

    public function modificationProduitBd($id,$titre,$prix,$image){
        $req = "
        update produits
        set titre = :titre, prix = :prix, image = :image
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":prix", $prix, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getProduitById($id)->setTitre($titre);
            $this->getProduitById($id)->setPrix($prix);
            $this->getProduitById($id)->setImage($image);
        }
    }

    public function commandeBd($titre,$prix,$nombre){
        $req = "
        INSERT INTO produitduclient (titre, prix, nombre)
        values (:titre, :prix, :nombre)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_INT);
        $stmt->bindValue(":nombre",$nombre,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        
        if($resultat > 0){
            
            
        }  

               
    }
}