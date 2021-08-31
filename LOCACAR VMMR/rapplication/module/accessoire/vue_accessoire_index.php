    <h2>accessoire</h2>
    <p><a class="btn btn-primary" href="<?=hlien("accessoire","edit","id",0)?>">Nouveau accessoire</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Label</th>
			<th>Prix</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['acc_id'])?></td>
			<td><?=mhe($row['acc_label'])?></td>
			<td><?=mhe($row['acc_prix'])?></td><td><a class="btn btn-warning" href="<?=hlien("accessoire","edit","id",$row["acc_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("accessoire","del","id",$row["acc_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>