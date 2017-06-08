<?php

    //session_start(); // ouverture ou reprise d'une session déjà ouverte
    include 'includes/util.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';

    //var_dump($_SESSION); // renvoie null si aucune session ouverte
    // sinon renvoie tableau associaif (potentiellement vide)

    //$_SESSION['test'] = 'ça marche';

    //var_dump($_SESSION);

?>
<h1>POST</h1>

<?php
    //print_r($_POST);
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (isset($_POST['admin'])) {
        $admin = $_POST['admin'];
    }
    

    /*$test = "coco";
    if (isset($test)) {
        echop("La variable $test est définie");
    } else {
        echop("La variable $test n'est pas définie");
    }*/

    if ($email == "test@test.fr" && $pass == 1234 && isset($admin)) { //$admin == "on"
        echop("Identification réussie...");

        // Enregistrer cet état dans la session
        $_SESSION['logged'] = true;
        header('location:index.php');
    } else {
        echop("L'identification a échoué...");
    }
?>


<?php include 'includes/footer.php'; ?>