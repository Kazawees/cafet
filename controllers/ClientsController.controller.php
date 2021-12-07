<?php
require_once "models/client/clientManager.class.php";

class ClientsController{
    private $clientManager;

    public function __construct(){
        $this->clientManager = new ClientManager;
        $this->clientManager->chargementClients();
    }

    public function afficherClients(){
        $clients = $this->clientManager->getClients();
        require "views/client/clients.view.php";
    }

    public function afficherClient($id){
        $client = $this->clientManager->getClientById($id);
        require "views/client/afficherClient.view.php";
    }

/*commande*/

    public function priseDeCommande(){
        $clients = $this->clientManager->getClients();
        require "views/commande/commande.view.php";
    }
     
 

/*client*/

    public function ajoutclient(){
        require "views/client/ajoutClient.view.php";
    }

    public function ajoutClientValidation(){
        
        
        $this->clientManager->ajoutClientBd($_POST['nom'],$_POST['prenom'], $_POST['email']);
        header('Location: '. URL . "clients");
    }

    public function suppressionClient($id){
        
        $this->clientManager->suppressionClientBd($id);
        header('Location: '. URL . "clients");
    }

    public function modificationClient($id){
        $client = $this->clientManager->getclientById($id);
        require "views/client/modifierclient.views.php";
    }

    public function modifictationClientValidation(){
       
        $this->clientManager->modificationClientBd($_POST['identifiant'],$_POST['titre'],$_POST['prenom'], $_POST['email']);
        header('Location: '. URL . "clients");
    }
 
    
}