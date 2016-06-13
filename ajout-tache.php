<?php
include "config.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php

    // je vérifie que le bouton submit a été clické
    if(isset($_POST['validation-ajout'])){
        // on récupère les valeurs et les traitent
        extract($_POST);
        $nom_tache = htmlspecialchars($nom_tache);
        $description_tache = htmlspecialchars($description_tache);
        $date_limite = htmlspecialchars($date_limite);
        $date_publication = date('Y-m-d');
        // sql
        $sql = 'INSERT INTO taches (TACHE,DESCRIPTION,DATE_PUBLICATION,DATE_LIMITE,CATEGORIE,PRIORITE) VALUES ("' . $nom_tache . '", "' . $description_tache .'", "' . $date_publication . '", "' . $date_limite .'", ' . $categorie . ', ' . $priorite . ')';
        $req = $db->prepare($sql);
        $req->execute();
        unset($_POST);
        unset($_GET);
?>
        <div id="center">
            <h2>Tâche <?= $nom_tache; ?> correctement ajoutée.</h2>
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
