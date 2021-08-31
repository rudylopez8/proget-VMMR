    <h2>auteur</h2>
    <p><a class="btn btn-primary" href="<?=hlien("auteur","edit","id",0)?>">Nouveau auteur</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Login</th>
			<th>Pwd</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['aut_id'])?></td>
			<td><?=mhe($row['aut_login'])?></td>
			<td><?=mhe($row['aut_pwd'])?></td><td><a class="btn btn-warning" href="<?=hlien("auteur","edit","id",$row["aut_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("auteur","del","id",$row["aut_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>