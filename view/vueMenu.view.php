<header>
    <h1><a href="../controler/main.ctrl.php">Figurine House</a></h1>
</header>
<nav>
<ul>
<li><p>Nos figurines</p>
    <ul>
<?php
foreach($nomsTypesFigurines as $id=>$nom) {
    $id_type = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?id_typeFigurine=$id_type\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li><p>Nos licences</p>
    <ul>
<?php
foreach($nomsLicences as $id=>$nom) {
    $id_licence = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?id_licence=$id_licence\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li><p>Nos marques</p>
    <ul>
<?php
foreach($nomsMarques as $id=>$nom) {
    $id_marque = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?id_marque=$id_marque\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li><p>Nos magasins</p>
    <ul>
<?php
foreach($nomsMagasins as $id=>$nom) {
    $id_magasin = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?id_magasin=$id_magasin\">$nom</a></li>\n");
}
?>
    </ul>
</li>
</ul>
</nav>
