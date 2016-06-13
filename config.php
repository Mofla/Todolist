<?php
    $user = "root";
    $pass = "root";
    $config = "mysql:host=localhost;dbname=Ze_simplon_todo";

    try{
        $db = new pdo($config,$user,$pass);
    }
    catch(Exception $e){
        echo 'Erreur dans la requête : '.$e->getMessage();
        die();
    }
?>