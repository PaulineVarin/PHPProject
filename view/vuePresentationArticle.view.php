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
    <article id="mon_article">
    <?php 
        $chemin = $config['image_path'].'articles/'.$article->getIdLicence().'/'.$article->getNomPhoto();
        $description = $article->getDescription();

        print("<img src=\"$chemin\" alt=\"\"/>\n");
        print("<div id=\"produit\">");
            print("<div id=\"nom_produit\">\n");
                print("<h2>{$article->getIntitule()}</h2>\n");
            print("</div>\n");
            print("<div id=\"description\">\n");
            print("<p>Référence : {$article->getRef()}</p><br>");
                foreach($description as $elem) {
                    print("<p>$elem</p><br>\n");
                }
                print("<p>Prix : {$article->getPrix()}</p>\n");
            print("</div>\n");
        print("</div>\n");
    ?>
    </article>

    <?php
        include("../controler/footer.ctrl.php");
    ?>
</body>

</html>