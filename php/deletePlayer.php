<?php

    include 'includes/connexion_db.php'; // fournit $db


    // récupération de l'id du joueur
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // 1) connexion
        $db = connect();

        // 2) requête
        $query = $db->prepare('DELETE FROM joueur WHERE id = :id');

        // UPDATE `joueur` SET `numero_maillot` = '10' WHERE `joueur`.`id` = 11;
        //('UPDATE joueur SET (nom, prenom, age, numero_maillot) WHERE (:nom,:prenom ,:age,:numero_maillot )');
        // UPDATE joueur as J SET J.numero_maillot = 21, J.age=21 WHERE J.id = 10


        // 3) exécution
        $query->execute(array(

            ':id' => $id

            ));

        var_dump($joueur);
        // redirection vers la liste des joueurs.
        header('location:joueurs.php');
    }

        

?>
