    <h2>message</h2>
    <p><a class="btn btn-primary" href="<?=hlien("message","edit","id",0)?>">Nouveau message</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Date</th>
			<th>Auteur</th>
			<th>Texte</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['mes_id'])?></td>
			<td><?=mhe($row['mes_date'])?></td>
			<td><?=mhe($row['aut_login'])?></td>
			<td><?=mhe($row['mes_texte'])?></td><td><a class="btn btn-warning" href="<?=hlien("message","edit","id",$row["mes_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("message","del","id",$row["mes_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>