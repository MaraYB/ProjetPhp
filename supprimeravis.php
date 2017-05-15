<html>
	<head>
        <title>Supprimer un avis</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			if (array_key_exists('avis',$_POST)) {
			$avis = $_POST['avis'];
		
			$db = new SQLite3('baseavis.db');		
			$delete = 'DELETE from donnees WHERE "avis" = \'' . $avis . '\'';
			$results = $db -> exec($delete);
			echo "<p>Avis supprimé</p>";    
			}
		?>
	</body>
	<p class="retour">
		<a href ="accueil.php">
		retour à l'accueil
		</a>
	</p>
</html>