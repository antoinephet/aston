<?php
    include 'includes/connexion_db.php';

    $db = connect();

    // 2) requête
        $query = $db->prepare('INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe) values (:nom,:prenom ,:age,:numero_maillot, :equipe )');

    // 3) exécution
    $result = $query->execute(array(
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':age' => $_POST['age'],
        ':numero_maillot' => $_POST['maillot'],
        ':equipe' => $_POST['equipe']
        ));

    //echo 'merci';
    //echo json_encode($_POST);

    echo $result; // renvoie le résultat de la equête sql (booléen) au client

?>