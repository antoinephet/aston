<?php

    include 'includes/util.inc.php';

    $str = "benfica-blablabla-coucou.jpg";
    //echo strlen($str); // renvoie 28


    $len = strlen($str); // 28
    $sub = substr($str,$len-4);
    //echo $sub;

    // echo substr($str,5,3);

    /*echo substr($str)

    for ($i=-1;$i>-6;+i++) {
        echo '<p>' . substr($str, $i) . '</p>';
    }*/

    /*$file = '';
    var_dump(expression);
    $extension = substr($file, -4);

    echo $extension;*/


    $name = 'Mian AC'; // retour attendu : milan-ac
    echo rightFormat($name);

?>