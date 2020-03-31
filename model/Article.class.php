<?php
class Article {
    private $reference; //référence unique 
    private $intitule; //titre de l'article
    private $descriptionArticle; //description 
    private $prix; 
    private $photo; // Nom du fichier image
    private $id_typeFigurine;
    private $id_licence;

    //Getters
    public function getRef():int {
        return $this->reference;

    }

    public function getIntitule():string {
        return $this->intitule;
    }

    public function getDescription():array {
        $maDescription = explode('/',$this->descriptionArticle);
        return $maDescription;
    }

    public function getPrix():int {
        return $this->prix;
    }

    public function getNomPhoto():string {
        return $this->photo;
    }

    public function getIdTypeFigurine():int {
        return $this->idTypeFigurine;
    }

    public function getIdLicence():int {
        return $this->idLicence;
    }
}

?>