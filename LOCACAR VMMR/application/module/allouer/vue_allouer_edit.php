<form method="post">
    <div class='form-group'>
        <input type="hidden" name="all_id" value="<?=$all_id?>">
        <input type="hidden" name="all_categorie" value="<?=$all_categorie?>">
        <input type="hidden" name="all_tranche" value="<?=$all_tranche?>">
        <input type="hidden" name="cat_label" value="<?=$cat_label?>">
        <input type="hidden" name="tra_min" value="<?=$tra_min?>">
        <input type="hidden" name="tra_max" value="<?=$tra_max?>">
        <label for='all_categorie'>Categorie : </label>
        <span><?= $cat_label ?></span>
    </div>
    <div class='form-group'>
        <label for='all_tranche'>Tranche : </label>
        <span>Entre <?= $tra_min . " et " . $tra_max  ?></span>
    </div>
    <div class='form-group'>
        <label for='all_prix'>Prix : </label>
        <input id='all_prix' name='all_prix' type='text' size='50' value='<?= mhe($all_prix) ?>' class='form-control' />
    </div>
    <div>
        <?=$message?> 
    </div>
    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>