<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);

//Récupérer toutes mes marques
$tableauMarques = $db->getAllMarques();
$nb_articles = $db->getNbArticles();

$tableauArticles = $db->getNArticles($nb_articles-2,$config['nb_images_main']);

include("../view/vueMain.view.php");
?>