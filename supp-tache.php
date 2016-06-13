<?php
    include "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>

    <?php
        // je vérifie que le bouton supprimer a été cliqué
        if(isset($_POST['supprimer-article']) && isset($_GET['id'])){
            $id = intval($_GET['id']);
            $sql = 'DELETE FROM taches WHERE ID_TACHE = '.$id.';';
            $req = $db->prepare($sql);
            $req->execute();
            unset($_POST);
            unset($_GET);
    ?>
            <div id="center">
                <h2>Tâche <?= $nom_tache; ?> correctement supprimée.</h2>
                <br>
                Redirection dans 3 secondes.<br>
                <a href="index.php">Cliquer ici</a> si la redirection ne se fait pas.
            </div>
            <script type="text/javascript">
                setTimeout(function(){
                    window.location.href='index.php';
                },3000);
            </script>
    <?php
    }
    // sinon je redirige
    else{
        header("Location:index.php");
    }

    ?>
    
    </body>
</html>