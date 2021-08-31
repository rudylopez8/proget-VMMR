        <form method="post" action="<?=hlien("auteur","edit")?>">
		<input type="hidden" name="aut_id" id="aut_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='aut_login'>Login</label>
                            <input id='aut_login' name='aut_login' type='text' size='50' value='<?=mhe($aut_login)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='aut_pwd'>Pwd</label>
                            <input id='aut_pwd' name='aut_pwd' type='text' size='50' value='<?=mhe($aut_pwd)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              