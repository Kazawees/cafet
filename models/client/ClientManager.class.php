<?php
require_once "models/Model.class.php";
require_once "models/client/Client.class.php";

class ClientManager extends Model{
    private $clients;//tableau de client

    public function ajoutClient($client){
        $this->clients[] = $client;
    }

    public function getClients(){
        return $this->clients;
    }

    public function chargementClients(){
        $req = $this->getBdd()->prepare("SELECT * FROM clients");
        $req->execute();
        $mesClients = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesClients as $client){
            $l = new Client($client['id'],$client['nom'],$client['prenom'],$client['email']);
            $this->ajoutClient($l);
        }
    }

    public function getClientById($id){
        for($i=0; $i < count($this->clients);$i++){
            if($this->clients[$i]->getId() === $id){
                return $this->clients[$i];
            }
        }
        throw new Exception("le client n'existe pas !");
    }

    public function ajoutClientBd($nom,$prenom,$email){
        $req = "
        INSERT INTO clients (nom, prenom, email)
        values (:nom, :prenom, :email)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $client = new Client($this->getBdd()->lastInsertId(),$nom,$prenom,$email);
            $this->ajoutClient($client);
        }        
    }

    public function suppressionClientBd($id){
        $req = "
        Delete from clients where id = :idClient
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idClient",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $client = $this->getClientById($id);
            unset($client);

        }
    }

    public function modificationClientBd($id,$nom,$prenom,$email){
        $req = "
        update clients
        set nom = :nom, prenom = :prenom, email = :email
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getClientById($id)->setNom($nom);
            $this->getClientById($id)->setPrenom($prenom);
            $this->getClientById($id)->setEmail($email);
        }
    }
}