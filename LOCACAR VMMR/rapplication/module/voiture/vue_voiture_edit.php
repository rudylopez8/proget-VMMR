        <form method="post" action="<?=hlien("voiture","edit")?>">
		<input type="hidden" name="voi_id" id="voi_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='voi_marque'>Marque</label>
                            <input required id='voi_marque' name='voi_marque' type='text' size='50' value='<?=mhe($voi_marque)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_plaque'>Plaque</label>
                            <input required id='voi_plaque' name='voi_plaque' type='text' size='50' value='<?=mhe($voi_plaque)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_color'>Color</label>
                            <input required id='voi_color' name='voi_color' type='text' size='50' value='<?=mhe($voi_color)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='voi_agence'>Agence</label>
                            <select name="voi_agence" id="voi_agence">
                                <?php listDeroulante($age,$voi_agence,"age_id","age_nom"); ?>
                            </select>
                        </div>
                        <div class='form-group'>
                            <label for='voi_categorie'>Categorie</label>
                            <select name="voi_categorie" id="voi_categorie">
                                <?php listDeroulante($cat,$voi_categorie,"cat_id","cat_label"); ?>
                            </select>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              