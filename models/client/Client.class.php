<?php
class Client{
    private $id;
    private $nom;
    private $prenom;
    private $email;

    public function __construct($id,$nom,$prenom,$email){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){$this->prenom = $prenom;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}
}