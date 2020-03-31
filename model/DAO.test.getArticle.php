<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file("../config/config.ini");

$db = new DAO($config['data_path']);

$a = $db->getArticle(14);
var_dump($a);
$res = $a->getDescription();
var_dump($res);

?>