<nav>
<ul>
    <li>Nos figurines
        <ul>
<?php
foreach($nomsTypesFigurines as $id=>$nom) {
    print("<li><a>$nom</a></li></br>");
}
?>
</ul>
</li>
</ul>
</nav>