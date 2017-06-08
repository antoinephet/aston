<?php
    include_once 'connexion_db.php';

    function getTeams(){

        $db = connect();
        $query = $db->prepare('SELECT * FROM pays');
        $query-> execute();

        return $query->fetchAll();
    }

    function getTeamById($id){

        $db = connect();
        $query = $db->prepare(
            'SELECT * FROM equipe WHERE id = :id');
        $query->execute(array(
            ':id' => $id

            ));
        return $query->fetch();
    }

    function selectFormat($teams){

        $output = '<select name="equipe">';

        foreach ($teams as $team) {
            $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>';
        }

        $output .= '</select>';

        return $output;


    }


    function tableFormat($teams){

        $output = '<table class="table table-striped equipe">';
        $output .= '<tr><th>Nom</th><th>Capitale</th><th>Superficie</th><th>Nombre habitants</th><th>Langues parlées</th><th>Drapeau</th></tr>';

        foreach ($teams as $team) {
            $output .= '<tr>';
            $output .= '<td>'.$team['nom'].'</td>';
            $output .= '<td>'.$team['capitale'].'</td>';
            $output .= '<td>'.$team['superficie'].'</td>';
            $output .= '<td>'.$team['nb_habitant'].'</td>';
            $output .= '<td>'.$team['langues'].'</td>';
            $output .= '<td>'.$team['drapeau'].'</td>';
            //$output .= '<td><img src="'.$team['logo'].'"></td>';
            $output .= '</tr>';
        }

        $output .= '</table>';

        return $output;


    }

    function selectFormatWithSelectedOpt($teams, $opt){

        $output = '<select name="equipe">';

        foreach ($teams as $team) {
            if($team['id'] == $opt){
                $output .= '<option selected value="'.$team['id'].'">'.$team['nom'].'</option>';
            } else {
                $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>';
            }
        }

        $output .= '</select>';

        return $output;
    }

    function createTeam($team){

        $db = connect();
        $query = $db->prepare('
            INSERT INTO equipe (nom, entraineur, couleurs, logo)
            VALUES (:nom,:entraineur ,:couleurs,:logo)');

        $result = $query->execute(array(
            ':nom' => $team['nom'],
            ':entraineur' => $team['entraineur'],
            ':couleurs' => $team['couleurs'],
            ':logo' => $team['logo']
            ));

        return $result; // boolean (vrai si succès, faux si échec)

    }

?>