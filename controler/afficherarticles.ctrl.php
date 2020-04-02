<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);


if(isset($_GET['ref'])) {
    $ref = $_GET['ref'];
}else {
    $ref = 1;
    print("Ma ref est $ref");
}

if(isset($_GET['id_licence'])) {
    $idcat = $_GET['id_licence'];
    $cat = 'id_licence';
    $tableauArticles = $db->getArticlesFiltre($ref,$idcat,$cat,$config['nb_images']);

}elseif(isset($_GET['id_typeFigurine'])) {
    $idcat = $_GET['id_typeFigurine'];
    $cat = 'id_typeFigurine';
    $tableauArticles = $db->getArticlesFiltre($ref,$idcat,$cat,$config['nb_images']);

}elseif(isset($_GET['id_marque'])) {
    $idcat = $_GET['id_marque'];
    $cat = 'id_marque';
    $tableauArticles = $db->getArticlesMarque($ref,$idcat,$config['nb_images']);

}elseif(isset($_GET['id_magasin'])) {
    $idcat = $_GET['id_magasin'];
    $cat = 'id_magasin';
    $tableauArticles = $db->getArticlesMagasin($ref,$idcat,$config['nb_images']);
}

else {
    $idcat = 0;
    $cat ='all';
    $tableauArticles = $db->getNArticles($ref,$config['nb_images']);
}

$firstRef = $tableauArticles[0]->getRef();
$lastRef = $tableauArticles[count($tableauArticles)-1]->getRef();


$nextRef = $db->nextN($lastRef,$idcat,$cat); print("next ref : $nextRef");
$prevRef = $db->prevN($firstRef,$idcat,$cat,$config['nb_images']); print("prev ref : $prevRef");

if($nextRef == -1) {
    $nextRef = $lastRef;
}

if($prevRef == -1) {
    $prevRef = $firstRef;
}


include("../view/vueAfficherArticles.view.php");
?>