        <form method="post" action="<?=hlien("utilisateur","edit")?>">
		<input type="hidden" name="uti_id" id="uti_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='uti_nom'>Nom</label>
                            <input id='uti_nom' name='uti_nom' type='text' size='50' value='<?=mhe($uti_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_prenom'>Prenom</label>
                            <input id='uti_prenom' name='uti_prenom' type='text' size='50' value='<?=mhe($uti_prenom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_login'>Login</label>
                            <input id='uti_login' name='uti_login' type='text' size='50' value='<?=mhe($uti_login)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_mdp'>Mdp</label>
                            <input id='uti_mdp' name='uti_mdp' type='text' size='50' value='<?=mhe($uti_mdp)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_adresse'>Adresse</label>
                            <input id='uti_adresse' name='uti_adresse' type='text' size='50' value='<?=mhe($uti_adresse)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_email'>Email</label>
                            <input id='uti_email' name='uti_email' type='text' size='50' value='<?=mhe($uti_email)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_telephone'>Telephone</label>
                            <input id='uti_telephone' name='uti_telephone' type='text' size='50' value='<?=mhe($uti_telephone)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_profil'>Profil</label>
                            <input id='uti_profil' name='uti_profil' type='text' size='50' value='<?=mhe($uti_profil)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_agence'>Agence</label>
                            <input id='uti_agence' name='uti_agence' type='text' size='50' value='<?=mhe($uti_agence)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              