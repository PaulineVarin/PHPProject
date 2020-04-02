<?php
$config = parse_ini_file("../config/config.ini");

/*vérifier de quel type de filtrage il s'agit 
- licence
- marque 
- type de figurine
-quel magasin
(proposer option tout)si on force alors on affiche tout sans distinction
*/

var_dump($_GET['id_type']);
include("../view/vueArticles.view.php");
?>