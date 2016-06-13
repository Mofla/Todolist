<?php
    // chargement de la base de données
    include "config.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ze Simplon To-do list</title>
        <script type="text/javascript" src="js.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>

    <!-- création de div pour afficher les pages categories et taches -->
    <div id="div-categories">
        <?php include "categories.php"; ?>
    </div>

    <div id="div-taches">
        <?php include "taches.php"; ?>
    </div>

    <?php include "header.php" ?>

    <div id="div-index">
        <?php include "affichage.php" ?>
    </div>

    <?php // fermeture de la db, à laisser tout à la fin au cas où
        $db = null;
    ?>
    </body>
</html>