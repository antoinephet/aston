<?php
    include 'includes/header.php';
    include 'includes/menu.php';
    echo '<head><link rel="stylesheet" type="text/css" href="css/style.css"></head>';
    // *** boucles ***
    // FOR
    for ($i=0; $i < 3; $i++) {
        echo "<p>" . ($i+1)."</p>";
    }

    // WHILE
    $i=0; // variable servant d'incrémenteur
    while ( $i < 3) {
        echo "<p>" . ($i+1)."</p>";
        $i++;
    }

    // FOREACH
    // boucle idéal pour parcourir les tableaux
    $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    echo "<select>";
    foreach ($mois as $m) {
        // la variable $m est automatiquement assigné
        // à chaque itération, elle correspondra tour à tour, à chaque
        // valeur contenu dans le tableau $mois 
        echo "<option>". $m ."</option>";
    }

    
    echo "</select>";
    echo "</br>";
    $animaux = ["casoar", "elephant", "loup"];
    foreach ($animaux as $animal) {
        echo "<img style=\"width:400px\" src=\"img/". $animal . ".jpg\">";
    } // échapper entre guilemets

    // echo "<div><img style=\"width:" . $width . "px;border: 2px".$color."solid\"
    // src=\"img/".$animal.".jpg\"></div>

    echo "</br>";
    for ($x=1; $x < 7; $x++) {
        echo "<div class='tableau'><img src=img/img". $x . ".jpg height=200px width=200px>";
        echo "</div>";
    }

    echo '<script src="js/script.js"></script>';

    // Exo
    // Afficher Deux autres photos au choix
    // Affiher une bordure colorée autour des images
 ?>

 <?php include 'includes/footer.php'; ?>