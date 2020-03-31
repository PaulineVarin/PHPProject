<nav>
<ul><li><p>Nos figurines</p>
    <ul>
<?php
foreach($nomsTypesFigurines as $id=>$nom) {
    $id_type = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?id_type=$id_type\">$nom</a></li>\n");
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

<li><a href="../controler/affichermagasins.ctrl.php">Nos magasins</a></li>
</ul>
</nav>