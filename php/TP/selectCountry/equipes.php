<?php


    include 'includes/util.inc.php';
    include 'includes/equipe.inc.php';
    include 'includes/header.php';
    include 'includes/menu.php';

?>


<h1>Équipes</h1>




<?php
    
    echo tableFormat(getTeams());

    // var_dump(getTeamById($joueur['equipe']));


?>


<?php include 'includes/footer.php'; ?>