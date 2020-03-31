<?php
class Licence {
    private $id_licence;
    private $nom;


    //Getters
    function getId():int {
        return $this->id_licence;
    }

    function getNom():string {
        return $this->nom;
    }

}

?>