
<?php

    // 1) connexion

    function connect(){

        $db = new PDO('mysql:host=localhost;dbname=formation-poec;charset=utf8', 'root', '');
        return $db;
    }
    
    


?>