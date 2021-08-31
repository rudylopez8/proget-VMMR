        <form method="post" action="<?=hlien("location","edit")?>">
		<input type="hidden" name="loc_id" id="loc_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='loc_utilisateur'>Utilisateur</label>
                            <input id='loc_utilisateur' name='loc_utilisateur' type='text' size='50' value='<?=mhe($loc_utilisateur)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_voiture'>Voiture</label>
                            <input id='loc_voiture' name='loc_voiture' type='text' size='50' value='<?=mhe($loc_voiture)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_date_demande'>Date_demande</label>
                            <input id='loc_date_demande' name='loc_date_demande' type='text' size='50' value='<?=mhe($loc_date_demande)?>'  class='form-control' />
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
                            <label for='loc_type'>Type</label>
                            <input id='loc_type' name='loc_type' type='text' size='50' value='<?=mhe($loc_type)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_statut'>Statut</label>
                            <input id='loc_statut' name='loc_statut' type='text' size='50' value='<?=mhe($loc_statut)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_agence_depart'>Agence_depart</label>
                            <input id='loc_agence_depart' name='loc_agence_depart' type='text' size='50' value='<?=mhe($loc_agence_depart)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='loc_agence_arrivee'>Agence_arrivee</label>
                            <input id='loc_agence_arrivee' name='loc_agence_arrivee' type='text' size='50' value='<?=mhe($loc_agence_arrivee)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              