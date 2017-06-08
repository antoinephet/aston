<?php
    //session_start();
    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';


    //var_dump($_SESSION);


    // note concernant l'upload
    // Pour prendre en compte des fichiers > 2M
    // Modifier le fichier php.ini : C\wamp64\bin\php\<php_version>
    // upload_max_filesize = 2M

    if (isset($_POST['input']) && isset($_FILES)) {

        $extension = substr($_FILES['logo']['name'],-4);
        $conditions = 
            $_FILES['logo']['size'] < 500000 && 
            isFormatAllowed($extension);

        var_dump(isFormatAllowed($extension));

        
        //var_dump($team);

        /*// echo 'Le client a validé le formulaire';
          */


        //var_dump($_POST);
        //var_dump($_FILES['logo']);

        // upload du fichier
        if($conditions){ // si la taille du fichier est inférieur à 500000
            var_dump($_FILES);

            // déplacer le fichier de la zone temporaire vers son emplacement "définitif" sur le serveur
            
            $src = $_FILES['logo']['tmp_name'];
            //$dest = 'img/logo/'. $_FILES['logo']['name'];
            $dest = 'img/logo/'. rightFormat($_POST['nom']) . $extension;

            move_uploaded_file($src, $dest);


            $team = $_POST; // copie $_POST dans $team

            // on ajoute la clé 'logo' au tableau associatif $team
            $team['logo'] = $dest;

            if (createTeam($team)) {
                // redirection
                header('location:equipes.php');
                } else {
                    echo '<p class="text-warning">L\'enregistrement a échoué</p>';
            }

        } else {
            echo '<p>Fomat non autorisé ou Fichier trop lourd</p>';
        }
        
    }

    //chargement des équipes
    // var_dump(getTeams());


?>

<?php
    // if (isset($_SESSION['logged']))
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] == 'admin') {
            include 'includes/addTeamForm.inc.php';
        } else {
            echop('Droits insuffisants');
        }
        
    } else{
        echop('Vous devez être connecté pour accéder à cette ressource');
    }

?>





 <?php include 'includes/footer.php'; ?>