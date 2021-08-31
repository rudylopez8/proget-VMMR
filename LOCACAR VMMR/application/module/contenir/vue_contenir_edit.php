        <form method="post" action="<?=hlien("contenir","edit")?>">
		<input type="hidden" name="con_id" id="con_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='con_location'>Location</label>
                            <input id='con_location' name='con_location' type='text' size='50' value='<?=mhe($con_location)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='con_accessoire'>Accessoire</label>
                            <input id='con_accessoire' name='con_accessoire' type='text' size='50' value='<?=mhe($con_accessoire)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              