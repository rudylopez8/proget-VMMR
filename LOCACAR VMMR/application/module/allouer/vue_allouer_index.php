    <h2>allouer</h2>
    <p>
    	<a class="btn btn-primary" href="<?= hlien("categorie", "edit", "id", 0,"from","tarif") ?>">Nouvelle catégorie</a>
		<a class="btn btn-primary" href="<?=hlien("tranche","edit","id",0,"from","tarif")?>">Nouvelle Tranche</a>
    </p>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th></th>
    			<?php
				foreach ($cat as $c) {
					extract(array_map("mhe", $c));
					echo "<th><a href=" . hlien("categorie", "edit", "id", $cat_id) . ">	$cat_label </a></th>";
				}
				?>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($tra as $t) {
				extract(array_map("mhe", $t)); ?>
    			<tr>
    				<td><a href="<?= hlien("tranche", "edit", "id", $tra_id) ?>"> Entre <?= $tra_min . " et " . $tra_max ?> </a></td>
    				<?php
					foreach ($cat as $c) {
						extract(array_map("mhe", $c));
						$enregistrement = Allouer::trouverPrix($tra_id, $cat_id);
						if ($enregistrement) {
							extract(array_map("mhe", $enregistrement));
							echo "<td><a href=" . hlien("allouer", "edit", "id", $all_id) . ">$all_prix</a></td>";
						} else {
							echo "<td><a href=" . hlien("allouer", "edit", "id", 0, "all_tranche", $tra_id, "all_categorie", $cat_id) . ">Pas défini ! </a></td>";
						}
					} ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>