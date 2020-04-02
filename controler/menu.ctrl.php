<?php

$nomsTypesFigurines = $db->getAllNomsTypeFigurine();
$nomsLicences = $db->getAllNomsLicences();
$nomsMarques = $db->getAllNomsMarques();
$nomsMagasins = $db->getallNomsMagasins();

include("../view/vueMenu.view.php");
?>