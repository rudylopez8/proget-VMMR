        <form method="post" action="<?=hlien("accessoire","edit")?>">
		<input type="hidden" name="acc_id" id="acc_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='acc_label'>Label</label>
                            <input id='acc_label' name='acc_label' type='text' size='50' value='<?=mhe($acc_label)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='acc_prix'>Prix</label>
                            <input id='acc_prix' name='acc_prix' type='text' size='50' value='<?=mhe($acc_prix)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              