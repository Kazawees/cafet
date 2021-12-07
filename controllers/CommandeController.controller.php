<?php
require_once "models/commande/ProduitDuClientManager.class.php";

class ProduitDuClientsController{
    private $ProduitDuClientManager;

    public function __construct(){
        $this->ProduitDuClientManager = new ProduitDuClientManager;
       
    }

    public function validationCommande(){
        header('Location: '. URL . "commande");
    }
 
}