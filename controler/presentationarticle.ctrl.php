<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);

$article = $db->getArticle($_GET['idArticle']);
include("../view/vuePresentationArticle.view.php");
?>