<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../view/design/styleMenu.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleFooter.css" type="text/css">
    <meta charset="UTF-8" />
    <title>Main</title>
</head>

<body>
<?php
include("../controler/menu.ctrl.php");
?>

<?php 
$chemin = $config['image_path'].'articles/'.$article->getIdLicence().'/'.$article->getNomPhoto();
print("<img src=\"$chemin\" alt=\"\"/>\n");
print("<p>{$article->getIntitule()}</p>");
$description = $article->getDescription();
foreach($description as $elem) {
    print("$elem</br>");
}
print("<p>{$article->getPrix()}</p>");

?>

<?php
include("../controler/footer.ctrl.php");
?>
</body>
</html>