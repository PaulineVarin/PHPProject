<?php
require_once("../model/Article.class.php");

class DAO {
    // L'objet local PDO de la base de donnée
    private $db;
    //Le chemin vers la base de donnée
    private $database;

    function __construct($path) {
        $this->database = 'sqlite:'.$path;
        try {
            $this->db = new PDO($this->database);
        }catch (PDOexception $e) {
            die("Impossible d'établir la connexion");
        }  
    }

    //////////////////////////////////////////////////////////
    ///METHODES
    //////////////////////////////////////////////////////////

    // Acces à un article 
    // Retourne un objet de la classe Article connaissant sa référence
    function getArticle(int $i): Article{
        $sql = "SELECT * FROM article WHERE reference = :ref";
        $req_select = $this->db->prepare($sql);
        $req_select ->execute(array('ref'=>$i));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res[0];
    }

    //Acces aux noms des types de figurines
    //Retourne un tableau, contenant le nom des différent types de figurines
    function getAllNomsTypeFigurine():array {
        $res = array();
        $sql = "SELECT nom FROM typeDeFigurine";

        $req_select = $this->db->prepare($sql);
        $req_select ->execute();

        while($row = $req_select->fetch(PDO::FETCH_NUM)) {
            array_push($res,$row[0]);
        }

        return $res;
    }

    //Acces aux noms des licences
    //Retourne un tableau, contenant le nom des différentes licences
    function getAllNomsLicences():array {
        $res = array();
        $sql = "SELECT nom FROM licence ";

        $req_select = $this->db->prepare($sql);
        $req_select ->execute();

        while($row = $req_select->fetch(PDO::FETCH_NUM)) {
            array_push($res,$row[0]);
        }
        return $res;
    }

    //Acces aux noms des marques
    //Retourne un tableau, contenant le nom des différentes marques
    function getAllNomsMarques():array {
        $res = array();
        $sql = "SELECT nom FROM marque ";

        $req_select = $this->db->prepare($sql);
        $req_select ->execute();

        while($row = $req_select->fetch(PDO::FETCH_NUM)) {
            array_push($res,$row[0]);
        }
        return $res;
    }
}
?>