<?php

class Magasin() {
    private $id_magasin;
    private $nom;
    private $description;

    //Getters
    function getId():int {
        return $this->id_magasin;
    }

    function getNom() {
        return $this->nom;
    }

    function getDescription() {
        return $this->description;
    }
}

?>