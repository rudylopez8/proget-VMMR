    <h2>contenir</h2>
    <p><a class="btn btn-primary" href="<?=hlien("contenir","edit","id",0)?>">Nouveau contenir</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Location</th>
			<th>Accessoire</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['con_id'])?></td>
			<td><?=mhe($row['con_location'])?></td>
			<td><?=mhe($row['con_accessoire'])?></td><td><a class="btn btn-warning" href="<?=hlien("contenir","edit","id",$row["con_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("contenir","del","id",$row["con_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>