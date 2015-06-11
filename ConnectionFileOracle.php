<?php try{

    $username = 'ctq418';
    $password = 'apj94ten';

    $con = new PDO('oci:dbname=//localhost:1521/dbwc', $username, $password);
        
    } catch(PDOException $e) {
        echo 'Error: '.$e -> getMessage();
        die();
    }
    ?>