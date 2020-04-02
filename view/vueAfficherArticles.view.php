<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../view/design/styleMenu.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleArticles.css" type="text/css">
    <meta charset="UTF-8" />
    <title>Main</title>
</head>

<body>
    <?php
    include("../controler/menu.ctrl.php");
    print("\n");
?>
    <div>
        <section id="Filtrage">

        </section>
        <section id="mes_articles">
            <?php
foreach ($tableauArticles as $id=>$elem) {
    $idArticle = $elem->getRef();
    $chemin = $config['image_path'].'articles/'.$elem->getIdLicence().'/'.$elem->getNomPhoto();
    print("<a href =\"../controler/presentationarticle.ctrl.php?idArticle=$idArticle\"><img src=\"$chemin\" alt=\"\"/></a>\n");
}
print("<a href =\"../controler/afficherarticles.ctrl.php?$cat=$idcat&ref=$prevRef\">Précédent</a>");
print("<a href =\"../controler/afficherarticles.ctrl.php?$cat=$idcat&ref=$nextRef\">Suiv</a>");

?>

        </section>
    </div>
</body>

</html>