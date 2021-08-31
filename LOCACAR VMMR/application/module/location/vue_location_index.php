    <h2>location</h2>
    <p><a class="btn btn-primary" href="<?= hlien("location", "edit", "id", 0) ?>">Nouveau location</a></p>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Utilisateur</th>
    			<th>Voiture</th>
    			<th>Date_demande</th>
    			<th>Debut</th>
    			<th>Fin</th>
    			<th>Type</th>
    			<th>Statut</th>
    			<th>Agence_depart</th>
    			<th>Agence_arrivee</th>
				<th>Accessoires</th>
    			<th>Modifier</th>
    			<th>Supprimer</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($result as $row) {
				
				if ($rfabl= $u->findAccessoiresBylocation($row["loc_id"])) {
					$accessoires = $rfabl["accessoires"];
				} else {
					$accessoires = "pas d'accessoires";
				}
				extract(array_map("mhe",$row)); ?>
    			<tr>

    				<td><?= $loc_id ?></td>
    				<td><?= $uti_nom . " " . $uti_prenom ?></td>
    				<td><?= $voi_marque . ", " . $voi_plaque . ", " . $cat_label . ", " . $voi_color  ?></td>
    				<td><?= $loc_date_demande ?></td>
    				<td><?= $loc_debut ?></td>
    				<td><?= $loc_fin ?></td>
    				<td><?= $loc_type ?></td>
    				<td><?= $loc_statut ?></td>
    				<td><?= $depart_nom ?></td>
    				<td><?= $arrivee_nom ?></td>
					<td><?= $accessoires ?></td>
    				<td><a class="btn btn-warning" href="<?= hlien("location", "edit", "id", $row["loc_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("location", "del", "id", $row["loc_id"]) ?>">Supprimer</a></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>