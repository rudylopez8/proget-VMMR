<form method="post">
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
                            <label for='uti_mdp'>Mot de passe : </label>
                            <input id='uti_mdp' name='uti_mdp' type='text' size='50' value='<?=mhe($uti_mdp)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_mdp2'>Vérification du mot de passe : </label>
                            <input id='uti_mdp2' name='uti_mdp2' type='text' size='50' value=''  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_adresse'>Adresse</label>
                            <input id='uti_adresse' name='uti_adresse' type='text' size='50' value='<?=mhe($uti_adresse)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_email'>Email</label>
                            <input id='uti_email' name='uti_email' type='email' size='50' value='<?=mhe($uti_email)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_telephone'>Telephone</label>
                            <input id='uti_telephone' name='uti_telephone' type='text' size='50' value='<?=mhe($uti_telephone)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <?=$message ?>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="S'inscrir" />
	</form>              