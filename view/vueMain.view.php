<!DOCTYPE html>
<html lang="fr">

<head>
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
                $chemin = $config['image_path'].'articles/'.$elem->getIdLicence().'/'.$elem->getNomPhoto();
                print("<article>\n");
                print("<h3>{$elem->getIntitule()}</h3>\n");
                print("<a href =\"../controler/affichermarque.ctrl.php?idMarque=\"><img src=\"$chemin\" alt=\"\"/></a>\n");
                print ("</article>\n");
            }
        ?>
        </div>
    </section>

    <section id="marques">
        <h2>Nos marques</h2>
        <div>
        <?php
            foreach($tableauMarques as $id => $elem) {
                $chemin = $config['image_path'].'marques/'.$elem->getNomPhoto();
                $idMarque = $id+1;
                print("<article>\n");
                print("<h3>{$elem->getNom()}</h3>");
                print("<a href =\"../controler/affichermarque.ctrl.php?idMarque=$idMarque\"><img src=\"$chemin\" alt=\"\"/></a>\n");
                print("</article>\n");
            }
        ?>
        </div>
    </section>
    
    <footer>
        <div>
            <article>
                <h3>A propos de Figurine House</h3>
                <ul>
                    <li><a href="../controler/affichermagasins.ctrl.php">Nos magasins</a></li>
                    <li><a href="">Nous contacter</a></li>
                </ul>
            </article>
            <article>
                <h3>Mentions Légales</h3>
                <ul>
                    <li><a href="">Cookies</a></li>
                    <li><a href="">Données personnelles</a></li>
                </ul>
            </article>
        </div>
        <p>Figurine House Inc. © 2020. All Rights Reserved.</p>
    </footer>

</body>

</html>