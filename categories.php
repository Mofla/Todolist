<?php
    //on affiche tous les catégories de la db sous forme de liste
    $sql = 'SELECT * FROM categories ORDER BY CATEGORIE ASC';
    $req = $db->prepare($sql);
?>
    <h4 class="titre">Catégories</h4>
    <ul id="liste-categories">
        <li><a href="index.php">&#8627; Toutes les tâches</a></li>
<?php
    $req->execute();
    foreach($req as $categories){
        $sql2 = 'SELECT Count(ID_TACHE) AS Cnt FROM taches AS T JOIN categories AS C ON T.CATEGORIE = C.ID_CAT WHERE T.CATEGORIE ='.$categories['ID_CAT'].';';
        $req2 = $db->prepare($sql2);
        $req2->execute();
        $res = $req2->fetchObject();
?>
        
        <li><a href="index.php?cat=<?= $categories['ID_CAT']; ?>" >&#8627; <?= $categories['CATEGORIE'].' ('.$res->Cnt.')'; ?></a>
        <form action="supp-categorie.php?id=<?= $categories['ID_CAT']; ?>" method="post" class="form-supp-cat" onsubmit="return confirm('Confirmer la suppression ?')">
            <input type="submit" value="" name="suppression-categorie" class="btn-x" />
        </form>
        </li>
<?php
    }
?>
    </ul>
        <!-- Formulaire d'ajout de categorie -->
<hr>
<h3 class="titre">Ajouter une nouvelle catégorie :</h3>
<form action="ajout-categorie.php" method="post" onsubmit="return confirm('Confirmer l\'ajout de la catégorie ?')">
    <label name="nouvelle_categorie">Nom</label>
    <br>
    <input type="text" name="nouvelle_categorie" required/>
    <br>
    <input type="submit" name="validation_categorie" value="Ajouter"/>
</form>
<br>
