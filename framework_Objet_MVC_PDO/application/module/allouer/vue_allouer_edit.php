        <form method="post" action="<?=hlien("allouer","edit")?>">
		<input type="hidden" name="all_id" id="all_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='all_categorie'>Categorie</label>
                            <input id='all_categorie' name='all_categorie' type='text' size='50' value='<?=mhe($all_categorie)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='all_tranche'>Tranche</label>
                            <input id='all_tranche' name='all_tranche' type='text' size='50' value='<?=mhe($all_tranche)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='all_prix'>Prix</label>
                            <input id='all_prix' name='all_prix' type='text' size='50' value='<?=mhe($all_prix)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              