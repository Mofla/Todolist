<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
<body>

<?php

    // je vérifie qu'on a bien rempli le formulaire
    if(isset($_POST['validation_categorie'])){
        // j'encode en utf-8
        $categorie = utf8_encode($categorie);
        // j'enlève les caractères dangereux
        $categorie = htmlspecialchars($_POST['nouvelle_categorie']);
        // je mets en majuscule la 1e lettre
        $categorie = ucfirst($categorie);
        //tout d'abord je vérifie que la catégorie n'existe pas
        $sql = 'SELECT ID_CAT FROM categories WHERE CATEGORIE LIKE "'.$categorie.'"';
        $req = $db->prepare($sql);
        $req->execute();
        $res = $req->fetch();
        if($res < 1){
            // si c'est bon, j'ajoute la requête
            $sql = 'INSERT INTO categories (CATEGORIE) VALUES ("'.$categorie.'")';
            $req = $db->prepare($sql);
            $req->execute();
            unset($_POST);
?>
            <div id="center">
                <h2>Catérogie : <i><?= $categorie; ?></i> ajoutée</h2>
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
        else{ // sinon je dis que la catégorie existe déjà
?>
            <div id="center">
                <h1>Catérogie : <i><?= $categorie; ?></i> déjà existante</h1>
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
    }
    else{ //sinon je renvois sur l'index
        header("Location:index.php");
    }
?>
</body>
</html>
