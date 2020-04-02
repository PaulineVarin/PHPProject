<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);

//Récupérer toutes mes marques
$tableauMarques = $db->getAllMarques();

$tableauArticles = $db->getNArticles($config['nb_images_main']);

include("../view/vueMain.view.php");
?>