<form method="post">
    <input type="hidden" name="tra_id" id="tra_id" value="<?= $id ?>" />
    <div class='form-group'>
        <label for='tra_min'>Min</label>
        <input required id='tra_min' name='tra_min' type='text' size='50' value='<?= mhe($tra_min) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='tra_max'>Max</label>
        <input required id='tra_max' name='tra_max' type='text' size='50' value='<?= mhe($tra_max) ?>' class='form-control' />
    </div>
    <div>
        <?=$message?>
    </div>
    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>