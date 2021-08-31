    <h2>utilisateur</h2>
    <p><a class="btn btn-primary" href="<?=hlien("utilisateur","edit","id",0)?>">Nouveau utilisateur</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Login</th>
			<th>Adresse</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Profil</th>
			<th>Agence</th><th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['uti_id'])?></td>
			<td><?=mhe($row['uti_nom'])?></td>
			<td><?=mhe($row['uti_prenom'])?></td>
			<td><?=mhe($row['uti_login'])?></td>
			<td><?=mhe($row['uti_adresse'])?></td>
			<td><?=mhe($row['uti_email'])?></td>
			<td><?=mhe($row['uti_telephone'])?></td>
			<td><?=mhe($row['uti_profil'])?></td>
			<td><?=mhe($row['uti_agence'])?></td><td><a class="btn btn-warning" href="<?=hlien("utilisateur","edit","id",$row["uti_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("utilisateur","del","id",$row["uti_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>