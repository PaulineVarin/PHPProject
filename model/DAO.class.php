<?php
require_once("../model/Article.class.php");
require_once("../model/Marque.class.php");

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

    function getNbArticles(): string {
        $sql = "SELECT COUNT(*) FROM article";
        
        $req_select = $this->db->prepare($sql);
        $req_select ->execute();

        $res = $req_select->fetch(PDO::FETCH_NUM);
        return $res[0];
    }

    // Acces à tout les article 
    // Retourne un tableau contenant un objet Article pour chaque article présent dans la BD
    function getAllArticles(): array{
        $sql = "SELECT * FROM article";

        $req_select = $this->db->prepare($sql);
        $req_select ->execute();

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;
    }
    //Acces à toutes les marque
    //Retourne un tableau contenant un objet Marque pour chaque marque présente dans la BD
    function getAllMarques():array {
        $res = array();
        $sql = "SELECT * from marque";

        $req_select = $this->db->prepare($sql);
        $req_select->execute();

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Marque');
        return $res;

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

    // Acces à un article 
    // Retourne un objet de la classe Article connaissant sa référence
    function getArticle(int $i): Article{
        $sql = "SELECT * FROM article WHERE reference = :ref";
        $req_select = $this->db->prepare($sql);
        $req_select ->execute(array('ref'=>$i));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res[0];
    }

    //Acces à une liste de nb articles à partir de la reférence $ref
    //Retourne un tableau contenant n articles
    function getNArticles(int $ref,int $nb):array {
        $res = array ();
        $sql = "SELECT * FROM article WHERE reference >= :ref  ORDER BY reference ASC LIMIT :nb";

        $req_select = $this->db->prepare($sql);
        $req_select->execute(array('ref'=>$ref,'nb'=>$nb));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;
    }

    //Acces à la liste de n articles en fonction d'un filtre (licence ou type )
    //Retourne un tableau contenant n articles en fonction d'un filtre (licence ou type)
    function getArticlesFiltre(int $ref,int $idFiltre,string $nomFiltre,int $nb):array {
        $res = array();
        $sql = "SELECT * FROM article WHERE $nomFiltre = :filtre AND reference >=:ref ORDER BY reference ASC LIMIT :nb";

        $req_select = $this->db->prepare($sql);
        $req_select->execute(array(':filtre'=>$idFiltre,':ref'=>$ref,':nb'=>$nb));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;
    }

    //Acces à la liste de n articles en fonction d'une marque
    //Retourne un tableau contenant n articles en fonction d'une marque 
    function getArticlesMarque(int $ref,int $idFiltre,int $nb):array {
        $res = array();
        $sql = "SELECT * from article WHERE reference>=:ref AND id_typeFigurine IN (SELECT id_type FROM TypeDeFigurine WHERE id_marque=$idFiltre) ORDER BY reference ASC LIMIT :nb";
        
        $req_select = $this->db->prepare($sql);
        $req_select->execute(array(':ref' => $ref,':nb'=>$nb));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;

    }

    // Acces à la référence qui suit la référence $ref dans l'ordre des références en fonction ou non d'un catégorie
    // Retourne -1 si ref est la dernière référence
    function nextN (int $ref,int $ref_categorie, string $nomFiltre):int {
        if($nomFiltre=='all'){
            $sql = "SELECT * FROM article WHERE reference > :ref ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array('ref'=>$ref));

        }elseif($nomFiltre=='titi') {
            print("totot");

        }else {
            $sql = "SELECT * FROM article WHERE reference > :ref AND $nomFiltre = :refcat ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array('ref'=>$ref,':refcat'=>$ref_categorie));
        }

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        if(count($res)==0){
            return -1;
        }else {
            return $res[0]->getRef();
        }
    }
    // Acces à la référence qui précède de n la référence $ref dans l'ordre des références en fonction ou non d'un catégorie
    // Retourne -1 si pas de ref précédente
    function prevN(int $ref,int $ref_categorie, string $nomFiltre,int $nb):int {
        $listeArticles = array();
        if($nomFiltre=='all') {
            $sql ="SELECT * FROM article WHERE reference <:ref ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':nb'=>$nb));

        }elseif($nomFiltre=='id_marque'){
            $sql = "SELECT * from article WHERE reference<:ref AND id_typeFigurine IN (SELECT id_type FROM TypeDeFigurine WHERE id_marque=:ref) ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':nb'=>$nb));

        }else {
            $sql ="SELECT * FROM article WHERE reference <:ref AND $nomFiltre = :refcat ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':refcat'=>$ref_categorie,':nb'=>$nb));
        }
        
        $listeArticles = $req_select->fetchAll(PDO::FETCH_CLASS,'Article'); 

        if(count($listeArticles)!=0) {
            return $listeArticles[count($listeArticles)-1] ->getRef();
        }
        return -1;
    }







}
?>