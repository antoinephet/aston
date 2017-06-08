<?php

    include_once 'access.inc.php';
    $menus = [
        ['href' => 'index.php', 'label' => 'Accueil'],
        ['href' => 'variables.php', 'label' => 'Variables'],
        ['href' => 'boucles.php', 'label' => 'Boucles'],
        ['href' => 'fonctions.php', 'label' => 'Fonctions'],
        ['href' => 'get.php?country=italie&sport=football', 'label' => 'GET'],
        ['href' => 'post.php', 'label' => 'POST'],
        ['href' => 'players.php', 'label' => 'Players'],
        ['href' => 'joueurs.php', 'label' => 'Joueurs'],
        ['href' => 'equipes.php', 'label' => 'Équipes'],
        ['href' => 'addPlayer.php', 'label' => 'Ajouter un joueur'],
        ['href' => 'addTeam.php', 'label' => 'Ajouter une équipe']
    ];
?>



<nav>
    <ul class="list-inline">
    <?php foreach ($menus as $menu): ?>
        <li>
            <a href="<?php echo $menu['href']; ?>">
                <?php echo $menu['label']; ?>
                
            </a> <!-- echo '<li>' . $menu['label'] . '</li>'; -->
        </li>
    <?php endforeach ?>
        <?php
            if(isLogged()){ //(isset($_SESSION['user']))
                echo '<li><a href="logout.php">Déconnexion</a></li>';
            }
        ?>
    </ul>
</nav>