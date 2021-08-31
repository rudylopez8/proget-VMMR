        <form method="post" action="<?=hlien("voiture","edit")?>">
		<input type="hidden" name="voi_id" id="voi_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='voi_marque'>Marque</label>
                            <input id='voi_marque' name='voi_marque' type='text' size='50' value='<?=mhe($voi_marque)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_plaque'>Plaque</label>
                            <input id='voi_plaque' name='voi_plaque' type='text' size='50' value='<?=mhe($voi_plaque)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_color'>Color</label>
                            <input id='voi_color' name='voi_color' type='text' size='50' value='<?=mhe($voi_color)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_agence'>Agence</label>
                            <input id='voi_agence' name='voi_agence' type='text' size='50' value='<?=mhe($voi_agence)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_categorie'>Categorie</label>
                            <input id='voi_categorie' name='voi_categorie' type='text' size='50' value='<?=mhe($voi_categorie)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              