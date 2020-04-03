<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../view/design/styleMenu.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleFooter.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleMain.css" type="text/css">
    <meta charset="UTF-8" />
    <title>Main</title>
</head>

<body>
<?php
    include("../controler/menu.ctrl.php");
    print("\n");
?>
    <section>
        <h2>Nos nouveautés</h2>
        <div id="mes_articles">
        <?php
            foreach($tableauArticles as $id=>$elem) {
                $idArticle = $elem->getRef();
                $chemin = $config['image_path'].'articles/'.$elem->getIdLicence().'/'.$elem->getNomPhoto();
                print("<article>\n");
                print("<a href =\"../controler/presentationarticle.ctrl.php?idArticle=$idArticle\"><img src=\"$chemin\" alt=\"\"/></a>\n");
                print("<h3>{$elem->getIntitule()}</h3>\n");
                print ("</article>\n");
            }
        ?>
        </div>
    </section>

    <section id="marques">
        <h2>Présentation de nos partenaires</h2>
        <div>
        <?php
            foreach($tableauMarques as $id => $elem) {
                $chemin = $config['image_path'].'marques/'.$elem->getNomPhoto();
                $idMarque = $id+1;
                print("<article>\n");
                print("<h3>{$elem->getNom()}</h3>");
                print("<a href =\"../controler/affichermarque.ctrl.php?id_marque=$idMarque\"><img src=\"$chemin\" alt=\"\"/></a>\n");
                print("</article>\n");
                print("</br>");
            }
        ?>
        </div>
    </section>
<?php
include("../controler/footer.ctrl.php");
?>
</body>
</html>