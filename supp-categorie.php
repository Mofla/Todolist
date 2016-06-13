<?php
    include "config.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>

    <?php
    // je vérifie si le button pour supprimer a été cliqué
    if(isset($_POST['suppression-categorie']) && isset($_GET['id'])){
        // d'abord je vérifie qu'il n'y a aucune tâche associée à la catégorie
        // si il y en a une, j'empêche la suppression
        $id = intval($_GET['id']);
        $sql = 'SELECT Count(ID_TACHE) AS Compte FROM taches WHERE CATEGORIE = '.$id.';';
        $req = $db->prepare($sql);
        $req->execute();
        $len = $req->fetchObject();
        if($len->Compte < 1){
            $suppression_ok = true;
        }
        else{
            $suppression_ok = false;
        }
        // Une fois mon booléen récup, je fais ma requête dans le cas où c'est bon
        if($suppression_ok) {
            $sql = 'DELETE FROM categories WHERE ID_CAT = ' . $id . ';';
            $req = $db->prepare($sql);
            $req->execute();
            unset($_POST);
            unset($_GET);
            ?>
            <div id="center">
                <h2>Catégorie correctement supprimée.</h2>
                <br>
                Redirection dans 3 secondes.<br>
                <a href="index.php">Cliquer ici</a> si la redirection ne se fait pas.
            </div>
            <script type="text/javascript">
                setTimeout(function () {
                    window.location.href = 'index.php';
                }, 3000);
            </script>
            <?php
        }
        else{
            unset($_POST);
            unset($_GET);
        ?>
        <div id="center">
            <h2>Catégorie associée, impossible de la supprimer.</h2>
            <br>
            Redirection dans 3 secondes.<br>
            <a href="index.php">Cliquer ici</a> si la redirection ne se fait pas.
        </div>
        <script type="text/javascript">
            setTimeout(function () {
                window.location.href = 'index.php';
            }, 3000);
        </script>
    <?php
        }
    }
    // sinon je redirige
    else{
        header("Location:index.php");
    }
    ?>
    
    </body>
</html>
