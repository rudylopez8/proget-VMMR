        <form method="post" action="<?=hlien("affaire","edit")?>">
		<input type="hidden" name="aff_id" id="aff_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='loc_id'>Id</label>
                            <input id='loc_id' name='loc_id' type='text' size='50' value='<?=mhe($loc_id)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_agence_depart'>Agence_depart</label>
                            <input id='loc_agence_depart' name='loc_agence_depart' type='text' size='50' value='<?=mhe($loc_agence_depart)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_agence_arrivee'>Agence_arrivee</label>
                            <input id='loc_agence_arrivee' name='loc_agence_arrivee' type='text' size='50' value='<?=mhe($loc_agence_arrivee)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_debut'>Debut</label>
                            <input id='loc_debut' name='loc_debut' type='text' size='50' value='<?=mhe($loc_debut)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_fin'>Fin</label>
                            <input id='loc_fin' name='loc_fin' type='text' size='50' value='<?=mhe($loc_fin)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_voiture'>Voiture</label>
                            <input id='loc_voiture' name='loc_voiture' type='text' size='50' value='<?=mhe($loc_voiture)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='NBH'></label>
                            <input id='NBH' name='NBH' type='text' size='50' value='<?=mhe($NBH)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='PrixTotalHeures'>TotalHeures</label>
                            <input id='PrixTotalHeures' name='PrixTotalHeures' type='text' size='50' value='<?=mhe($PrixTotalHeures)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='PrixAccessoires'>Accessoires</label>
                            <input id='PrixAccessoires' name='PrixAccessoires' type='text' size='50' value='<?=mhe($PrixAccessoires)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='Total'>L</label>
                            <input id='Total' name='Total' type='text' size='50' value='<?=mhe($Total)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              