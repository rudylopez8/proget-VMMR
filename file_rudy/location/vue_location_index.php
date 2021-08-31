    <h2>location</h2>
	<td><?=mhe($row['uti_nom'])?></td>
    <p><a class="btn btn-primary" href="<?=hlien("location","edit","id",0)?>">Nouveau location</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Identifiant Utilisateur</th>
			<th>Nom Utilisateur</th>
			<th>Prenom Utilisateur</th>
			<th>Voiture</th>
			<th>Date_demande</th>
			<th>Debut</th>
			<th>Fin</th>
			<th>Type</th>
			<th>Statut</th>
			<th>Agence_depart</th>
			<th>Agence_arrivee</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['loc_id'])?></td>
			<td><?=mhe($row['uti_id'])?></td>
			<td><?=mhe($row['uti_nom'])?></td>
			<td><?=mhe($row['uti_prenom'])?></td>
			<td><?=mhe($row['voi_plaque'])?></td>
			<td><?=mhe($row['loc_date_demande'])?></td>
			<td><?=mhe($row['loc_debut'])?></td>
			<td><?=mhe($row['loc_fin'])?></td>
			<td><?=mhe($row['loc_type'])?></td>
			<td><?=mhe($row['loc_statut'])?></td>
			<td><?=mhe($row['age_nom'])?></td>
			<td><?=mhe($row['age_nom'])?></td><td><a class="btn btn-warning" href="<?=hlien("location","edit","id",$row["loc_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("location","del","id",$row["loc_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>