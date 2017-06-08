<?php
    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';
    include 'includes/access.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';

    if (isset($_POST['input'])) {
        // echo 'Le client a validé le fomulaire';

        

        // 1) connexion
        $db = new PDO('mysql:host=localhost;dbname=formation-poec;charset=utf8', 'root', '');

        // 2) requête
        $query = $db->prepare('INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe) values (:nom,:prenom ,:age,:numero_maillot, :equipe )');

        // 3) exécution
        $query->execute(array(
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':age' => $_POST['age'],
            ':numero_maillot' => $_POST['numero_maillot'],
            ':equipe' => $_POST['equipe']
            ));


        // redirection
        header('location:joueurs.php');
    } else {
        // echo 'Le client n\'a pas validé le fomulaire';
    }

    //chargement des équipes
    //var_dump(getTeams());




?>

<?php
    // if (isset($_SESSION['logged']))
    /*if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] == 'admin' || 'client') {
            include 'includes/addPlayerForm.inc.php';
        } else {
            echop('Droits insuffisants');
        }
        
    } else{
        echop('Vous devez être connecté pour accéder à cette ressource');
    }*/

    if (isLogged()) {
        if (getRole() == 'admin' || 'client') {
            include 'includes/addPlayerForm.inc.php';
        } else {
            echop('Droits insuffisants');
        }
    } else {

        echop('Vous devez être connecté pour accéder à cette ressource');
    }

?>





 <?php include 'includes/footer.php'; ?>