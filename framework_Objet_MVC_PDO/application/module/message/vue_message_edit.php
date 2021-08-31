        <form method="post" action="<?=hlien("message","edit")?>">
		<input type="hidden" name="mes_id" id="mes_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='mes_date'>Date</label>
                            <input id='mes_date' name='mes_date' type='text' size='50' value='<?=mhe($mes_date)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='mes_auteur'>Auteur</label>
                            <input id='mes_auteur' name='mes_auteur' type='text' size='50' value='<?=mhe($mes_auteur)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='mes_texte'>Texte</label>
                            <input id='mes_texte' name='mes_texte' type='text' size='50' value='<?=mhe($mes_texte)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              