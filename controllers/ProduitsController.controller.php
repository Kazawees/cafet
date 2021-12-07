<?php
require_once "models/produit/ProduitManager.class.php";

class ProduitsController{
    private $produitManager;

    public function __construct(){
        $this->produitManager = new ProduitManager;
        $this->produitManager->chargementProduits();
    }

    public function afficherProduits(){
        $produits = $this->produitManager->getProduits();
        require "views/produit/produits.view.php";
    }

    public function afficherProduit($id){
        $produit = $this->produitManager->getProduitById($id);
        require "views/produit/afficherProduit.view.php";
    }

    public function ajoutProduit(){
        require "views/produit/ajoutProduit.view.php";
    }

    public function ajoutProduitValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);
        $this->produitManager->ajoutProduitBd($_POST['titre'],$_POST['prix'],$nomImageAjoute);
        header('Location: '. URL . "produits");
    }

    public function suppressionProduit($id){
        $nomImage = $this->produitManager->getProduitById($id)->getImage();
        unlink('public/images/'.$nomImage);
        $this->produitManager->suppressionProduitBd($id);
        header('Location: '. URL . "produits");
    }

    public function modificationProduit($id){
        $produit = $this->produitManager->getProduitById($id);
        require "views/produit/modifierProduit.views.php";
    }

    public function modifictationProduitValidation(){
        $imageActuelle = $this->produitManager->getProduitById($_POST["identifiant"])->getImage();
        $file = $_FILES['image'];

        if($file['size'] > 0 ){
            unlink('public/images/'.$imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        }else{
            $nomImageToAdd = $imageActuelle;
        }
        $this->produitManager->modificationProduitBd($_POST['identifiant'],$_POST['titre'],$_POST['prix'],$nomImageToAdd);
        header('Location: '. URL . "produits");
    }


    public function ajoutProduitClient(){
        //require_once "models/client/ClientManager.class.php";
        $produit = $this->produitManager->getProduits();
        
        require "views/commande/ajoutProduitClient.view.php";
    }

    

    

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}