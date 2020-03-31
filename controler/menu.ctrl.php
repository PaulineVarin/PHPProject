<?php

$nomsTypesFigurines = $db->getAllNomsTypeFigurine();
$nomsLicences = $db->getAllNomsLicences();
$nomsMarques = $db->getAllNomsMarques();

include("../view/vueMenu.php");
?>