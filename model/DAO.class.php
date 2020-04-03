<?php
require_once("../model/Article.class.php");
require_once("../model/Marque.class.php");
require_once("../model/Magasin.class.php");

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

    //Acces à tout les magasins
    //Retourne un tableau contenant un objet Magasin pour chaque magasin présent dans la BD
    function getAllMagasins():array {
        $res = array();
        $sql = "SELECT * from magasin";

        $req_select = $this->db->prepare($sql);
        $req_select->execute();

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Magasin');
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

    function getallNomsMagasins():array {
        $res = array();
        $sql = "SELECT nom FROM magasin ";

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
        $req_select ->execute(array(':ref'=>$i));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res[0];
    }

    //Acces à une liste de nb articles à partir de la reférence $ref
    //Retourne un tableau contenant n articles
    function getNArticles(int $ref,int $nb):array {
        $res = array ();
        $sql = "SELECT * FROM article WHERE reference >= :ref  ORDER BY reference ASC LIMIT :nb";

        $req_select = $this->db->prepare($sql);
        $req_select->execute(array(':ref'=>$ref,':nb'=>$nb));

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
        $sql = "SELECT * from article WHERE reference>=:ref AND id_typeFigurine IN (SELECT id_type FROM TypeDeFigurine WHERE id_marque=:filtre) ORDER BY reference ASC LIMIT :nb";
        
        $req_select = $this->db->prepare($sql);
        $req_select->execute(array(':ref' => $ref,':filtre'=>$idFiltre,':nb'=>$nb));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;
    }

    //Acces à la liste de n articles en fonction d'un magasin
    //Retourne un tableau contenant n articles en fonction d'un magasin 
    function getArticlesMagasin(int $ref,int $idFiltre,int $nb):array {
        $res = array();
        $sql = "SELECT * FROM article WHERE reference>=:ref AND reference IN (SELECT id_article FROM est_disponible WHERE id_magasin=:filtre) ORDER BY reference ASC LIMIT :nb";
        $req_select = $this->db->prepare($sql);
        $req_select->execute(array(':ref' => $ref,':filtre'=>$idFiltre,':nb'=>$nb));

        $res = $req_select->fetchAll(PDO::FETCH_CLASS,'Article');
        return $res;
    }

    // Acces à la référence qui suit la référence $ref dans l'ordre des références en fonction ou non d'un catégorie
    // Retourne -1 si ref est la dernière référence
    function nextN (int $ref,int $idFiltre, string $nomFiltre):int {
        if($nomFiltre=='all'){
            //affichage global
            $sql = "SELECT * FROM article WHERE reference > :ref ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref'=>$ref));

        }elseif($nomFiltre=='id_marque') {
            //En fonction d'une marque
            $sql = "SELECT * from article WHERE reference >:ref AND id_typeFigurine IN (SELECT id_type FROM TypeDeFigurine WHERE id_marque=:filtre) ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref'=>$ref,':filtre'=>$idFiltre));

        }elseif($nomFiltre=='id_magasin') {
            //En fonction d'un magasin
            $sql = "SELECT * FROM article WHERE reference>:ref AND reference IN (SELECT id_article FROM est_disponible WHERE id_magasin=:filtre) ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref'=>$ref,':filtre'=>$idFiltre));

        }else {
            //En fonction de la licence ou du type de figurine
            $sql = "SELECT * FROM article WHERE reference > :ref AND $nomFiltre = :filtre ORDER BY reference ASC LIMIT 1";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref'=>$ref,':filtre'=>$idFiltre));
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
    function prevN(int $ref,int $idFiltre, string $nomFiltre,int $nb):int {
        $listeArticles = array();
        if($nomFiltre=='all') {
            //affichage global
            $sql ="SELECT * FROM article WHERE reference <:ref ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':nb'=>$nb));

        }elseif($nomFiltre=='id_marque'){
            //En fonction d'une marque
            $sql = "SELECT * from article WHERE reference<:ref AND id_typeFigurine IN (SELECT id_type FROM TypeDeFigurine WHERE id_marque=:filtre) ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':filtre'=>$idFiltre,':nb'=>$nb));

        }elseif($nomFiltre=='id_magasin') {
            //En fonction d'un magasin
            $sql = "SELECT * FROM article WHERE reference<:ref AND reference IN (SELECT id_article FROM est_disponible WHERE id_magasin=:filtre) ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref'=>$ref,':filtre'=>$idFiltre,':nb'=>$nb));
        }
        
        else {
            //En fonction de la licence ou du type de figurine
            $sql ="SELECT * FROM article WHERE reference <:ref AND $nomFiltre = :filtre ORDER BY reference DESC LIMIT :nb";
            $req_select = $this->db->prepare($sql);
            $req_select->execute(array(':ref' => $ref,':filtre'=>$idFiltre,':nb'=>$nb));
        }
        
        $listeArticles = $req_select->fetchAll(PDO::FETCH_CLASS,'Article'); 

        if(count($listeArticles)!=0) {
            return $listeArticles[count($listeArticles)-1] ->getRef();
        }
        return -1;
    }







}
?>