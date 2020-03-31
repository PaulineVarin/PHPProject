<?php
class Marque {
    private $id_marque;
    private $nom;
    private $descriptionMarque;
    private $photo

    //Getters
    function getId():int{
        return $this->id_marque;
    }

    function getNom():string {
        return $this->nom;
    }

    function getDescription():string {
        return $this->descriptionMarque;
    }

    function getNomPhoto() {
        return $this->photo;
    }
}

?>