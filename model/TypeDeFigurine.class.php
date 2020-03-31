<?php
class TypeDeFigurine {
    private $id_type;
    private $nom;
    private $id_marque;

    //Getters
    function getId():int {
        return $this->id_type;
    }

    function getNom():string {
        return $this->nom;
    }

    function getIdMarque():int {
        return $this->id_marque;
    }
}

?>