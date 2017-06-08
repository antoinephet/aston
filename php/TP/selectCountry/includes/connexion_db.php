
<?php

    // 1) connexion

    function connect(){

        $db = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
        return $db;
    }
    
    


?>