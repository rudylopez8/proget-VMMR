        <form method="post" action="<?=hlien("departement","edit")?>">
		<input type="hidden" name="dep_id" id="dep_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='dep_label'>Label</label>
                            <input id='dep_label' name='dep_label' type='text' size='50' value='<?=mhe($dep_label)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              