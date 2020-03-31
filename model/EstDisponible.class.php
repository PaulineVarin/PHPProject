<?php
class EstDisponible {
    private $id_article;
    private $id_magasin;
    private $quantite;

    //Getters
    function getIdArticle():int {
        return $this->id_article;
    }

    function getIdMagasin():int {
        return $this->id_magasin;
    }

    function getQuantite():int {
        return $this->quantite;
    }
}
?>