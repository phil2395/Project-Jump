<?php try{

    $username = 'sql575339';
    $password = 'vQ1!nJ4*';

    $con = new PDO('sql5:host=sql5.freemysqlhosting.net', $username, $password);
        
    } catch(PDOException $e) {
        echo 'Error: '.$e -> getMessage();
        die();
    }
    ?>