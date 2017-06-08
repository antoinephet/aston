<?php
    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';

    if (isset($_GET['nomPays'])) { // isset = si la variable existe
        $nomPays = $_GET['nomPays'];

        // si l'utilisateur donne une valeur contenant plus de 2
        // caratères, on force $ageLimit à recevoir la valeur 35
        // par mesure de sécurité
        /*if (strlen($ageLimit) > 2) { // strlen = Calcule la taille d'une chaîne
            $ageLimit = 35;
        }*/
    }


    // bibliothèque utilisée pou dialoguer à MySQL : PDO
    // connexion à la base de données

    $db = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
    // préparation de la requête (en lecture)
    if (isset($nomPays)) {
        $query = $db->prepare('SELECT * FROM pays WHERE nom ='.$nomPays);
    } else {
        $query = $db->prepare('SELECT * FROM pays');
    }
    


    // exécution
    $data = $query->execute();

?>


<!DOCTYPE html>
<html>
<head>
    <title>CONSULTATION D'UN PAYS</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<h1>Consultation d'un pays</h1>



<div>
    <form>
        <label>Choisir</label>
        <select name="nomPays">
            <option value="Allemagne">Allemagne</option>
            <option value="Angleterre">Angleterre</option>
            <option value="Espagne">Espagne</option>
            <option value="France">France</option>
            <option value="Italie">Italie</option>  
        </select>
        <input type="submit" value="Valider">
    </form>
</div>


<?php
    /*foreach ($joueurs as $joueur) {
        echo '<p>'. $joueur['prenom'] . ' ' . $joueur['nom'] .'</p>';
    }*/

    // la méthode fetch () revoie sous forme d'un tableau php
    // la ligne (row) sql non traitée
    // les lignes sql déjà traitées (fetched) sont retirées l'objet $query
    // fetch() renvoie false quand toutes les lignes sql ont été traitées


    //$output = '';
    $output = '<div class="equipe">';
    $i = 0;


    // variable compteur
    while($pays = $query->fetch()){

        $i++;

        // À chaque itération la variable $joueur reçoit le résultat de fetch()
        // c'est-à-dire un tableau associatif contenant les données du joueur
 
        $output .= '<p>'.$pays['id'] .' '. $pays['nom'] .' '. $pays['capitale']. ' '. $pays['superficie'].' '.$pays['nb_habitant']. ' '. $pays['langues'].' '.$pays['drapeau'];
        $output .='</p>';


        
    }
    $output .='</div>';
    echo $output;

?>




<label>Choisissez</label>
    <?php
        echo selectFormat(getTeams()); 
    ?>
<button class="btn btn-primary btn-xs">Valider</button>

<?php

    echo tableFormat(getTeams());


?>

</body>
</html>



