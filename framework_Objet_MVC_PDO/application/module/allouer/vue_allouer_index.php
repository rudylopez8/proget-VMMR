    <h2>allouer</h2>
    <p><a class="btn btn-primary" href="<?=hlien("allouer","edit","id",0)?>">Nouveau allouer</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Categorie</th>
			<th>Tranche</th>
			<th>Prix</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['all_id'])?></td>
			<td><?=mhe($row['all_categorie'])?></td>
			<td><?=mhe($row['all_tranche'])?></td>
			<td><?=mhe($row['all_prix'])?></td><td><a class="btn btn-warning" href="<?=hlien("allouer","edit","id",$row["all_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("allouer","del","id",$row["all_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>