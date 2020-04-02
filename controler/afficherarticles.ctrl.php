<?php
require_once("../model/DAO.class.php");
$config = parse_ini_file('../config/config.ini');
$db = new DAO($config['data_path']);

/*vérifier de quel type de filtrage il s'agit 
- licence idLicence
- marque  idMarque
- type de figurine idType
-quel magasin idMagasin
(proposer option tout)si on force alors on affiche tout sans distinction
*/

if(isset($_GET['idLicence'])) {
    $idLicence = $_GET['idLicence'];
    $db-get

}elseif (isset($_GET['idMarque'])) {
    $idMarque = $_GET['idMarque'];

}elseif (isset($_GET['idType'])) {

}elseif(isset($_GET['idMagasin'])) {

}else {
    $default = 0;
}



include("../view/vueAfficherArticles.view.php");
?>