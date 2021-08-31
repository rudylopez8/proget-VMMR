    <h2>affaire</h2>
    <p><a class="btn btn-primary" href="<?=hlien("affaire","edit","id",0)?>">Nouveau affaire</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Agence_depart</th>
			<th>Agence_arrivee</th>
			<th>Debut</th>
			<th>Fin</th>
			<th>Voiture</th>
			<th></th>
			<th>TotalHeures</th>
			<th>Accessoires</th>
			<th>L</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['loc_id'])?></td>
			<td><?=mhe($row['loc_agence_depart'])?></td>
			<td><?=mhe($row['loc_agence_arrivee'])?></td>
			<td><?=mhe($row['loc_debut'])?></td>
			<td><?=mhe($row['loc_fin'])?></td>
			<td><?=mhe($row['loc_voiture'])?></td>
			<td><?=mhe($row['NBH'])?></td>
			<td><?=mhe($row['PrixTotalHeures'])?></td>
			<td><?=mhe($row['PrixAccessoires'])?></td>
			<td><?=mhe($row['Total'])?></td><td><a class="btn btn-warning" href="<?=hlien("affaire","edit","id",$row["aff_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("affaire","del","id",$row["aff_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>