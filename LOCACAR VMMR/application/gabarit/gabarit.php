<!DOCTYPE html>
<html>

<head>
	<?php require "../application/gabarit/inc_head.php" ?>
</head>

<body>
	<div class="container">
		<header>
			<?php require "../application/gabarit/inc_entete.php" ?>
		</header>

		<?php require "../application/gabarit/inc_menu.php"; ?>
		<pre>
			<?php print_r($_SESSION);
			print_r($_GET);
			print_r($_POST); ?> </pre>

		<div>
			<div id="menuPerso">
				<?php require "../application/gabarit/inc_menu_perso.php" ?>
			</div>
			<?php require $this->vue; ?>
		</div>
		<hr>
		<footer>
			<?php require "../application/gabarit/inc_pied.php"; ?>
		</footer>
	</div>
</body>

</html>