<?php

    include '../../includes/connexion_db.php';

    $id = $_GET['id']; // récupération de l'id fourni en paramètre d'url

    $db = connect(); // connexion à la db
    $db->exec("set names utf8"); // résoud le problème de l'encodage en utf8 (prélude nécessaire à l'encodage JSON)
    $query = $db->prepare('SELECT * FROM pays WHERE id = :id'); // requête SQL
    $query->execute(array(
        ':id' => $id

        ));

    $pays=$query->fetch();

    // réponse au client
    //echo $id;

    // utf8_encode(data) ne résout pas le problème
    echo json_encode($pays);

?>