<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);

/*vérifier de quel type de filtrage il s'agit 
- licence idLicence x
- marque  idMarque y
- type de figurine idType x 
-quel magasin idMagasin z 
(proposer option tout)si on force alors on affiche tout sans distinction

récupérer l'id du 1er et dernier article de la page $firstRef $lastRef
calculer la ref qui suit le dernier article $nextRef = $lastRef+1
calculer la ref qui précède de n l'article courant $prevRef= $firstRef-n
*/


if(isset($_GET['ref'])) {
    $ref = $_GET['ref'];
}else {
    $ref = 1;
}

if(isset($_GET['idLicence'])) {
    $idcat = $_GET['idLicence'];
    $cat = 'id_licence';

}elseif (isset($_GET['idMarque'])) {
    $idcat = $_GET['idMarque'];   

}elseif (isset($_GET['idType'])) {
    $cat = 'id_typeFigurine';
    
}elseif(isset($_GET['idMagasin'])) { 

}else {
    $idcat = 0;
    $cat ='all';
    $tableauArticles = $db->getNArticles($config['nb_images'],$ref);
}

$firstRef = $tableauArticles[0]->getRef();
$lastRef = $tableauArticles[count($tableauArticles)-1]->getRef();

//vérifier avec le 1 
$nextRef = $db->nextN($lastRef,$idcat,$cat); print("next ref : $nextRef");
$prevRef = $db->prevN($firstRef,$idcat,$cat,$config['nb_images']); print("prev ref : $prevRef");;


include("../view/vueAfficherArticles.view.php");
?>