<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../view/design/styleMenu.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleFooter.css" type="text/css">
    <link rel="stylesheet" href="../view/design/stylePageArticle.css" type="text/css">

    <meta charset="UTF-8" />
    <title>Présentation Article</title>
</head>

<body>
    <?php
        include("../controler/menu.ctrl.php");
    ?>
    <article id="produit">
    <?php 
        $chemin = $config['image_path'].'articles/'.$article->getIdLicence().'/'.$article->getNomPhoto();
        $description = $article->getDescription();

        print("<img src=\"$chemin\" alt=\"\"/>\n");
        print("<div>");
        print("<p>{$article->getIntitule()}</p>");

        foreach($description as $elem) {
            print("<p>$elem</p></br>\n");
        }
        
        print("<p>{$article->getPrix()}</p>");
        print("</div>");
    ?>
    </article>

    <?php
        include("../controler/footer.ctrl.php");
    ?>
</body>

</html>