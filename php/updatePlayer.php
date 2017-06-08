<?php

    include_once 'includes/connexion_db.php'; // fournit $db
    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';

    // récupération de l'id du joueur
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // 1) connexion
        $db = connect();

        // 2) requête
        $query = $db->prepare('SELECT * FROM joueur WHERE id = :id');

        // UPDATE `joueur` SET `numero_maillot` = '10' WHERE `joueur`.`id` = 11;
        //('UPDATE joueur SET (nom, prenom, age, numero_maillot) WHERE (:nom,:prenom ,:age,:numero_maillot )');
        // UPDATE joueur as J SET J.numero_maillot = 21, J.age=21 WHERE J.id = 10


        // 3) exécution
        $query->execute(array(

            ':id' => $id

            ));

        // 4) fetch
        $joueur = $query->fetch(); // un seul résultat atendu, donc 1 seul fetch (pas de boucle)

        var_dump($joueur);
    }


    // mise à jour de la table joueur
    if (isset($_POST['input1'])) {
        // le bouton de "Mettre à jour" a été cliqué

        // si la connection n'existe pas, on DOIT l'initialise avant l'étape de requête

        if (!isset($db)) $db = connect();

        
        $query = $db->prepare('UPDATE joueur AS J  SET J.nom= :nom, J.prenom= :prenom, J.age = :age, J.numero_maillot = :numero_maillot,
        J.equipe= :equipe WHERE J.id = :id');

        
        $query->execute(array(
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':age' => $_POST['age'],
            ':numero_maillot' => $_POST['numero_maillot'],
            ':equipe' => $_POST['equipe'],
            ':id' => $_POST['id']
            ));

        // redirection vers la liste des joueurs.
        header('location:joueurs.php');
    }

?>


<h1>Modifier un joueur</h1>
<form method="POST">

    <label>Nom</label>
    <input 
        type="text" 
        name="nom" 
        value="<?php echo $joueur['nom']?>">

    <label>Prénom</label>
    <input 
        type="text" 
        name="prenom" 
        value="<?php echo $joueur['prenom']?>">

    <label>Age</label>
    <input 
        type="text" 
        name="age" 
        value="<?php echo $joueur['age']?>">


    <label>Numero maillot</label>

    <!-- <input 
        type="text" 
        name="numero_maillot" 
        value="<?php echo $joueur['numero_maillot']?>"> --> 

    <select name="numero_maillot">
        <?php
            for ($i=1; $i < 1000; $i++) {
                if ($i == $joueur['numero_maillot']) {
                    echo '<option selected value="'.$i.'">'. $i.'</option>';
                } else{
                    echo '<option value="'.$i.'">'. $i.'</option>';
                }
                
            }
        ?>
    </select>

    <input type="hidden" name="id" value="<?php echo $id ?>">

    <label>Equipe</label>

    <?php
        echo selectFormatWithSelectedOpt(getTeams(),$joueur['equipe']);
    ?>

    

    <input type="submit" name="input1" value="Mettre à jour">
</form>



<?php include 'includes/footer.php'; ?>