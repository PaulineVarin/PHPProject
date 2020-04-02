<header>
    <h1>Figurine House</h1>
</header>
<nav>
<ul>
<li><p>Nos figurines</p>
    <ul>
<?php
foreach($nomsTypesFigurines as $id=>$nom) {
    $id_type = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?idType=$id_type\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li><p>Nos licences</p>
    <ul>
<?php
foreach($nomsLicences as $id=>$nom) {
    $id_licence = $id+1;
    print("<li><a href=\"../controler/afficherarticles.ctrl.php?idLicence=$id_licence\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li><p>Nos marques</p>
    <ul>
<?php
foreach($nomsMarques as $id=>$nom) {
    $id_marque = $id+1;
    print("<li><a href=\"../controler/affichermarque.ctrl.php?idMarque=$id_marque\">$nom</a></li>\n");
}
?>
    </ul>
</li>

<li id="exception"><a href="../controler/affichermagasins.ctrl.php">Nos magasins</a></li>
</ul>
</nav>