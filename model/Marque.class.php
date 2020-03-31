<?php
class Marque {
    private $id_marque;
    private $nom;
    private $descriptionMarque;

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
}

?>