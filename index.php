<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/ProduitsController.controller.php";
require_once "controllers/ClientsController.controller.php";
require_once "controllers/CommandeController.controller.php";
$produitController = new ProduitsController;
$clientController = new ClientsController;
$produitDuClientController = new ProduitDuClientsController;
try{
    if(empty($_GET['page'])){
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "accueil" : require "views/accueil.view.php";
            break;
            case "produits" : 
                if(empty($url[1])){
                    $produitController->afficherProduits();
                } else if($url[1] === "l") {
                    $produitController->afficherProduit($url[2]);
                } else if($url[1] === "a") {
                    $produitController->ajoutProduit();
                } else if($url[1] === "m") {
                    $produitController->modificationProduit($url[2]);
                } else if($url[1] === "s") {
                    $produitController->suppressionProduit($url[2]);
                } else if($url[1] === "av") {
                    $produitController->ajoutProduitValidation();
                }else if($url[1] === "mv") {
                    $produitController->modifictationProduitValidation();
                }
            break;
            case "clients" :
                if(empty($url[1])){
                    $clientController->afficherClients();
                } else if($url[1] === "l") {
                    $clientController->afficherClient($url[2]);
                } else if($url[1] === "a") {
                    $clientController->ajoutClient();
                } else if($url[1] === "m") {
                    $clientController->modificationClient($url[2]);
                } else if($url[1] === "s") {
                    $clientController->suppressionClient($url[2]);
                } else if($url[1] === "av") {
                    $clientController->ajoutClientValidation();
                }else if($url[1] === "mv") {
                    $clientController->modifictationClientValidation();
                }else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "commande" : 
                if(empty($url[1])){
                    $clientController->priseDeCommande();
                } else if($url[1] === "aj") {
                    $produitController->ajoutProduitClient($url[2]);
                }else if($url[1] === "v") {
                    $produitDuClientController->validationCommande();
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.views.php";
}
