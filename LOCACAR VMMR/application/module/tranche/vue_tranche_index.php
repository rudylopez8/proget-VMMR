    <h2>tranche</h2>
    <p><a class="btn btn-primary" href="<?=hlien("tranche","edit","id",0)?>">Nouveau tranche</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Min</th>
			<th>Max</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['tra_id'])?></td>
			<td><?=mhe($row['tra_min'])?></td>
			<td><?=mhe($row['tra_max'])?></td><td><a class="btn btn-warning" href="<?=hlien("tranche","edit","id",$row["tra_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("tranche","del","id",$row["tra_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>