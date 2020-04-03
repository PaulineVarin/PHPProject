<?php

class Magasin {
    private $id_magasin;
    private $nom;
    private $descriptionMagasin;
    private $photo;

    //Getters
    function getId():int {
        return $this->id_magasin;
    }

    function getNom():string {
        return $this->nom;
    }

    function getDescription():string {
        return $this->descriptionMagasin;
    }

    function getNomPhoto():string {
        return $this->photo;
    }
}

?>