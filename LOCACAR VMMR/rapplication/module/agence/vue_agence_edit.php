        <form method="post" action="<?=hlien("agence","edit")?>">
		<input type="hidden" name="age_id" id="age_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='age_nom'>Nom</label>
                            <input id='age_nom' name='age_nom' type='text' size='50' value='<?=mhe($age_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='age_departement'>Departement</label>
                            <select name="age_departement" id="age_departement">
                                <?php
                                listDeroulante($dep,$age_departement,"dep_id","dep_label") ; 
                                /*foreach($dep as $row) {
                                    extract(array_map("mhe", $row));
                                    $sel = ($age_departement == $dep_id) ? "selected" : "" ; 
                                    echo "<option value='$dep_id' $sel> $dep_label </option>"; 
                                } */
                                ?>
                            </select>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              