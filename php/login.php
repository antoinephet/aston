<?php

    include 'includes/util.inc.php';
    include 'includes/connexion_db.php';
    include 'includes/header.php';
    include 'includes/menu.php';


    if (isset($_POST['email']) && isset($_POST['pass'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        // connexion à MySql, requête et exécution
        $db = connect();
        $query = $db->prepare('
            SELECT * FROM users WHERE email = :email AND 
            password = :password
            ');
        $query->execute(array(
            ':email'    => $email,
            ':password' => $pass
            ));
        $result = $query->fetch();
        //var_dump($result);

        if ($result) { // si result est différent de false
            // on loggue l'utilisateur
            $_SESSION['user'] = $result;
            header('location:index.php');
        } else {
            echop('utilisateur/trice non reconnu(e)');
        }

    } else {

        echop('Formulaire non validé'); // accès par GET càd  

    }

?>



<?php include 'includes/footer.php'; ?>