<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file("../config/config.ini");

$db = new DAO($config['data_path']);

$tab = $db->getNArticles($config['nb_images_main']);
var_dump($tab);
?>