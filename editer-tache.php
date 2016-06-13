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
        // je vérifie que le bouton éditer a été cliqué
        if(isset($_POST['validation-editer']) && isset($_GET['id'])){
            // on récupère les valeurs et les traitent
            extract($_POST);
            $nom_tache = htmlspecialchars($nom_tache);
            $description_tache = htmlspecialchars($description_tache);
            $date_limite = htmlspecialchars($date_limite);
            $date_publication = date('Y-m-d');
            $id = $_GET['id'];
            // sql
            $sql = 'UPDATE taches SET TACHE = "'.$nom_tache.'", DESCRIPTION = "'.$description_tache.'", DATE_PUBLICATION = "'.$date_publication.'", DATE_LIMITE = "'.$date_limite.'", CATEGORIE = '.$categorie.', PRIORITE = '.$priorite.' WHERE ID_TACHE = '.$id.';';
            $req = $db->prepare($sql);
            $req->execute();
            unset($_POST);
            unset($_GET);
    ?>
            <div id="center">
                <h2>Tâche <?= $nom_tache; ?> correctement éditée.</h2>
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
