<?php
    include "config.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
    </head>
    <body>

    <?php
        // si on a cliqué sur éditer dans la liste des tâches, on
        // modifie une tâche
        if(isset($_GET['tache'])){
            $sql = 'SELECT * FROM taches AS T JOIN categories AS C ON T.CATEGORIE = C.ID_CAT WHERE T.ID_TACHE = '.$_GET['tache'];
            $req = $db->prepare($sql);
            $req->execute();
            $res = $req->fetchObject();
            //maintenant on fait le formulaire d'édition
    ?>
            <h4 class="titre">Editer tâche :</h4><br>
            <form action="editer-tache.php?id=<?= $_GET['tache']; ?>" method="post" onsubmit="return confirm('Confirmer l\'édition de la tâche ?')">
                <label name="nom_tache">Tâche :</label>
                <br>
                <input type="text" name="nom_tache" value="<?= $res->TACHE; ?>" required/>
                <br>
                <label name="description_tache">Description (optionnel) :</label>
                <br>
                <input type="text" name="description_tache" value="<?= $res->DESCRIPTION; ?>"/>
                <br>
                <label name="date_limite">Date limite <sup title="Ex pour le 10 juin 2016: 2016-06-10">?</sup>:</label>
                <br>
                <input type="date" name="date_limite" value="<?= $res->DATE_LIMITE; ?>" />
                <br>
                <!--  Fonction pour afficher toutes les catégories -->
                <label name="categorie">Catégorie :</label>
                <select name="categorie">
                    <?php
                        $sql2 = 'SELECT * FROM categories ORDER BY CATEGORIE ASC';
                        $req2 = $db->prepare($sql2);
                        $req2->execute();
                        foreach($req2 as $categories) {
                            if($categories['ID_CAT'] == $res->ID_CAT){
                                echo '<option value=' . $categories['ID_CAT'] . ' selected="selected">' . $categories['CATEGORIE'] . '</option>';
                            }
                            else{
                                echo '<option value=' . $categories['ID_CAT'] . '>' . $categories['CATEGORIE'] . '</option>';
                            }
                        }
                    ?>
                </select>
                <br>
                <!-- Fonction pour afficher une boite avec les priorités de 1 à 5 -->
                <label name="priorite">Priorité :</label>
                <select name="priorite">
                    <?php
                    $i = 0;
                    while($i<5){
                        $i++;
                        if($i == $res->PRIORITE)
                        {
                            echo '<option value=' . $i . ' selected="selected">' . $i . '</option>';
                        }
                        else{
                            echo '<option value=' . $i . '>' . $i . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <button onclick="window.location.href='index.php'" class="margin-btn">Annuler</button>
                <input type="submit" value="Editer" name="validation-editer" class="margin-btn"/>
            </form>
    <?php
        }
        // ************************************************
        // * Sinon je crée un formulaire d'ajout de tache *
        // ************************************************
        else{
    ?>
        <h4 class="titre">Ajouter tâche :</h4><br>
        <form action="ajout-tache.php" method="post" onsubmit="return confirm('Confirmer l\'ajout de la tâche ?')">
            <label name="nom_tache">Tâche :</label>
            <br>
            <input type="text" name="nom_tache" required/>
            <br>
            <label name="description_tache">Description (optionnel) :</label>
            <br>
            <input type="text" name="description_tache"/>
            <br>
            <label name="date_limite">Date limite <sup title="Ex pour le 10 juin 2016: 2016-06-10">?</sup>:</label>
            <br>
            <input type="date" name="date_limite" required/>
            <br>
            <label name="categorie">Catégorie :</label>
            <select name="categorie">
                <?php
                $sql2 = 'SELECT * FROM categories ORDER BY CATEGORIE ASC';
                $req2 = $db->prepare($sql2);
                $req2->execute();
                foreach($req2 as $categories) {
                    echo '<option value=' . $categories['ID_CAT'] . '>' . $categories['CATEGORIE'] . '</option>';
                }
                ?>
            </select>
            <br>
            <label name="priorite">Priorité :</label>
            <select name="priorite" required>
                <?php
                    $i = 0;
                    while($i<5){
                        $i++;
                        echo '<option value=' . $i . '>' . $i . '</option>';
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Ajouter" name="validation-ajout" />
        </form>

    <?php
        }
    ?>
        <br>
    </body>
</html>
