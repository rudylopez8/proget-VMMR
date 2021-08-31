    <h2>voiture</h2>
    <p><a class="btn btn-primary" href="<?=hlien("voiture","edit","id",0)?>">Nouvelle voiture</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Marque</th>
			<th>Plaque</th>
			<th>Coleure</th>
			<th>Agence</th>
			<th>Categorie</th><th>modifier</th>
				<th>supprimer voiture</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['voi_id'])?></td>
			<td><?=mhe($row['voi_marque'])?></td>
			<td><?=mhe($row['voi_plaque'])?></td>
			<td><?=mhe($row['voi_color'])?></td>
			<td><?=mhe($row['age_nom'])?></td>
			<td><?=mhe($row['cat_label'])?></td><td><a class="btn btn-warning" href="<?=hlien("voiture","edit","id",$row["voi_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("voiture","del","id",$row["voi_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>