<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>

    <!-- Méthode $_GET pour l'affichage -->
    <?php
    // affichage des tâches
    // Si le $_GET est défini on affiche seulement les tâches
    // de la dite catégorie
    if(isset($_GET['cat'])){
        $sql = 'SELECT * FROM taches AS T JOIN categories AS C ON T.CATEGORIE = C.ID_CAT WHERE ID_CAT = '.$_GET['cat'].' ORDER BY DATE_LIMITE, PRIORITE ASC';
    }
    else{ //sinon on affiche tous les tâches
        $sql = 'SELECT * FROM taches AS T JOIN categories AS C ON T.CATEGORIE = C.ID_CAT ORDER BY DATE_LIMITE, PRIORITE ASC';
    }
    $req = $db->prepare($sql);
    $req->execute();
    $i = 1;
    foreach($req as $taches){
        //création des div pour chaque entrée
        ?>
        <div id="taches">
            <h3><?= $taches['TACHE']; ?></h3>
            <span class="categorie-tache">Catégorie : <b><a href="index.php?cat=<?= $taches['ID_CAT']; ?>"><?= $taches['CATEGORIE']; ?></a></b></span>
            <span class="publiee-le">Publiée le : <b><?= $taches['DATE_PUBLICATION']; ?></b></span>
            <p class="gris"><span id="id-<?= $i; ?>" onclick="Description_display('id-<?= $i; ?>','description-<?= $i; ?>')">Description &#9662;</span>
                <br><span id="description-<?= $i; ?>"> <br><i> <?= $taches['DESCRIPTION']; ?> </i><br><br></span>
            </p>
            <span class="a-finir-le">Date limite : <b><?= $taches['DATE_LIMITE']; ?></b></span>
            <br>
            <p class="prio">Priorité <b><?= $taches['PRIORITE']; ?></b></p>
            <form action="index.php?tache=<?= $taches['ID_TACHE']; ?>" method="post" onsubmit="return confirm('Confirmer l\'édition ?');" class="blocs">
                <input type="submit" name="editer-article" value="Editer" class="margin-btn" />
            </form>
            <form action="supp-tache.php?id=<?= $taches['ID_TACHE']; ?>" method="post" onsubmit="return confirm('Confirmer la suppression ?');" class="blocs">
                <input type="submit" name="supprimer-article" value="Supprimer" class="margin-btn" />
            </form>


        </div>
        <?php
        $i++;
    }

    ?>
    
    </body>
</html>