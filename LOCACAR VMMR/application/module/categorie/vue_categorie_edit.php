        <form method="post">
		<input type="hidden" name="cat_id" id="cat_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='cat_label'>Label</label>
                            <input id='cat_label' name='cat_label' type='text' size='50' value='<?=mhe($cat_label)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              