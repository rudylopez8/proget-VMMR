
    </form>
    <form method="post" action="<?= hlien("location", "edit") ?>">
        <input type="hidden" name="loc_id" id="loc_id" value="<?= $id ?>" />
        <div class='form-group'>
            <label for='loc_utilisateur'>Utilisateur</label>
            <?php if ($_SESSION["profil"] =="client") { ?>
                <h3><?= $_SESSION["nom"] . " " .  $_SESSION["prenom"] ?></h3>
            <?php } else { ?>
                <input id='loc_utilisateur' name='loc_utilisateur' type='text' size='50' value='<?= mhe($loc_utilisateur) ?>' class='form-control' />
            <?php } ?>
        </div>
        <div class='form-group'>
            <label for='loc_date_demande'>Date_demande</label>
            <h3><?= $loc_date_demande ?></h3>
        </div>
        <div class='form-group'>
            <label for='date_debut'>Date et heure de debut : </label>
            <input type="date" name="date_debut[]" id="date_debut">
            <select name="date_debut[]" id="heure_debut">
                <?php listeHMS(7,22,15,""); ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='date_fin'>Date et heure de la Fin : </label>
            <input type="date" name="date_fin[]" id="date_fin"> 
            <select name="date_fin[]" id="heure_fin">
                <?php listeHMS(7,22,15,"");?>
            </select>
        </div>
        <div class='form-group'>
            <label for='voi_categorie'>Catégorie de voiture : </label>
            <select name="voi_categorie" id="voi_categorie">
                <?php
                listDeroulante($cat,$voi_categorie,"cat_id","cat_label"); 
                ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='loc_agence_depart'>Agence de depart</label>
            <select name="loc_agence_depart" id="loc_agence_depart">
                <?php listDeroulante($age,$loc_agence_depart,"age_id","age_nom") ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='loc_agence_arrivee'>Agence d'arrivee</label>
            <select name="loc_agence_arrivee" id="loc_agence_arrivee">
                <?php listDeroulante($age,$loc_agence_arrivee,"age_id","age_nom") ; ?>
            </select>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>