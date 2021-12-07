<?php
class ProduitDuClient{
    private $id;
    private $titre;
    private $prix;
    private $nombre;

    public function __construct($id,$titre,$prix,$nombre){
        $this->id = $id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->nombre = $nombre;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getPrix(){return $this->prix;}
    public function setPrix($prix){$this->prix = $prix;}

    public function getNombre(){return $this->nombre;}
    public function setNombre($nombre){$this->nombre = $nombre;}
}

?>