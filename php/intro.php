<?php
    echo "Bonjour \n";
    echo "<p>Au revoir</p>";
    echo "<ul><li>Pomme</li>";
    echo "<li>Mangue</li></ul>";

    
    $nb1 = 10;
    // Structures conditionnelles
    // if
    if($nb1 > 10){

        echo "Il est vrai que <b>" . $nb1 . "</b> est supérieur à 10";
    }elseif ($nb1 == 10) {
        echo "Il est vrai que <b>" . $nb1 . "</b> est égal à 10";
    } else {

        echo "Il n'est pas vrai que <b>" . $nb1 . "</b> est supérieur à 10";
    }

    if ($nb1 > 10000) {
        echo "<br/>". $nb1 . " est IMMENSE";
    } else{
        echo "<br/>". $nb1 . " n'est pas IMMENSE";
    }

    $connected = true; // false

    if ($connected) echo "<br/>"."Vous êtes connecté"; // $connected === true
    if (!$connected) echo "<br/>"."Vous n'êtes pas connecté"; // $connected === false

    if (!nb1 == 10) {
        // si $nb1 n'est pas égal (donc différent) à 10
        // autre syntaxe possible : $nb1 != 10
    }

 ?>