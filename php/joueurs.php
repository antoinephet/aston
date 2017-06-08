<?php


    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';

    if (isset($_GET['ageLimit'])) { // isset = si la variable existe
        $ageLimit = $_GET['ageLimit'];

        // si l'utilisateur donne une valeur contenant plus de 2
        // caratères, on force $ageLimit à recevoir la valeur 35
        // par mesure de sécurité
        if (strlen($ageLimit) > 2) { // strlen = Calcule la taille d'une chaîne
            $ageLimit = 35;
        }
    }


    // bibliothèque utilisée pou dialoguer à MySQL : PDO
    // connexion à la base de données

    $db = new PDO('mysql:host=localhost;dbname=formation-poec;charset=utf8', 'root', '');

    // préparation de la requête (en lecture)
    if (isset($ageLimit)) {
        $query = $db->prepare('SELECT * FROM joueur WHERE age < '.$ageLimit);
    } else {
        $query = $db->prepare('SELECT * FROM joueur');
    }
    


    // exécution
    $data = $query->execute(); // execute() renvoie vrai si réussite

    //$joueurs = $query->fetchAll();
    

    // la fonction var_dump affiche la description détaillé  (type et valeur)
    // de la variable fournie en entrée
    // utile pour le débogage
    //var_dump($data);





    /*$bdd = new PDO('mysql:host=localhost;dbname=formation-poec;charset=utf8', 'root', '');

    if (isset($bdd)) {
        echo "La base de données est connectée";
    }

    $reponse = $bdd->query('SELECT * FROM joueur');

    while ($donnees = $reponse->fetch()){
        echo '<br />'.$donnees['id'] .' '. $donnees['nom'] .' '. $donnees['prenom']. '<br />';
    }

    $reponse->closeCursor();*/
?>


<h1>Joueurs</h1>


<div>
    <form>
        <label>Limite d'âge</label>
        <select name="ageLimit">
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="35">35</option>  
        </select>
        <input type="submit" value="Valider">
    </form>
</div>


<p>Nombre de résultats : </p>

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
    while($joueur = $query->fetch()){

        $i++;

        // À chaque itération la variable $joueur reçoit le résultat de fetch()
        // c'est-à-dire un tableau associatif contenant les données du joueur

        $condition = 
            $joueur['numero_maillot'] > 0 &&
            $joueur['numero_maillot'] < 1000;

        if ($condition) {
            $output .= '<p>'.$joueur['id'] .' '. $joueur['nom'] .' '. $joueur['prenom']. ' ('. $joueur['numero_maillot'].') ';
        } else {

            $output .= '<p>'.$joueur['id'] .' '. $joueur['nom'] .' '. $joueur['prenom']. ' '; // .= conserve et ajoute la concaténation ensuite
        }

        $team = getTeamById($joueur['equipe']);
        if($team == false){
            $output .= ', SCF | ';
        } else {

            $output .= ', équipe : <img src="'.$team['logo'].'"> ';
        }

        //$output .= ', equipe : '.$joueur['equipe'].' | ';

        // var_dump(getTeamById($joueur['equipe']));

        $output .= '<a class="btn btn-primary btn-xs" href="updatePlayer.php?id='.$joueur['id'].'">Modifier</a>';
        $output .= ' | ';
        $output .= '<a class="btn btn-danger btn-xs" href="deletePlayer.php?id='.$joueur['id'].'">Supprimer</a>';
        $output .='</p>';
        
        
    }
    $output .='</div>';
    echo '<p>Nombre de résultats : ' .$i. '</p>';
    echo $output;

?>


<?php include 'includes/footer.php'; ?>