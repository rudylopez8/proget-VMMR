    <h2>agence</h2>
    <p><a class="btn btn-primary" href="<?=hlien("agence","edit","id",0)?>">Nouvelle agence</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Nom</th>
			<th>Departement</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['age_id'])?></td>
			<td><?=mhe($row['age_nom'])?></td>
			<td><?=mhe($row['dep_label'])?></td><td><a class="btn btn-warning" href="<?=hlien("agence","edit","id",$row["age_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("agence","del","id",$row["age_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>