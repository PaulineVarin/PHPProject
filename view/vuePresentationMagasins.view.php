<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <link rel="stylesheet" href="../view/design/styleMenu.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleFooter.css" type="text/css">
    <link rel="stylesheet" href="../view/design/styleDescriptionMagasins.css" type="text/css">
    <meta charset="utf-8">
    <title> Figurine House - Nos magasins </title>
</head>

<body>
    <?php
    include("../controler/menu.ctrl.php");
    print("\n");
    ?>

    <h2> Découvrez les points de vente partenaire de Figurine House ! </h2>
    <section id="nos_magasins">
      <?php
        foreach($tableauMagasins as $id =>$elem) {
          $chemin = $config['image_path'].'/magasins/'.$elem->getNomPhoto();
          print("<article>\n");
          print("<img src=\"$chemin\" alt=\"Affichage Magasin\">\n");
          print("<div>");
          print("<h3> Le {$elem->getNom()}</h3>");
          print("<p>{$elem->getDescription()}</p>");
          print("</div>");
          print("</article></br>\n");

        }
      ?> 
    </section >
    <?php
      include("../controler/footer.ctrl.php");
    ?> 
</body>

</html>