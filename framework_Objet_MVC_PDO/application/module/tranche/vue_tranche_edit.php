        <form method="post" action="<?=hlien("tranche","edit")?>">
		<input type="hidden" name="tra_id" id="tra_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='tra_min'>Min</label>
                            <input id='tra_min' name='tra_min' type='text' size='50' value='<?=mhe($tra_min)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_max'>Max</label>
                            <input id='tra_max' name='tra_max' type='text' size='50' value='<?=mhe($tra_max)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              