<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
   <link rel="stylesheet" href="style.css">
     <title>Bar Supprimé</title>
</head>
<body>

		<?php
			if (array_key_exists('bars',$_POST)) {
				$nom = $_POST['bars'];
				$effacer = 'DELETE from databar WHERE "nom_bar" = \'' . $nom . '\'';
				$db = new SQLite3('basebar.db');
				$results = $db -> exec($effacer);
				
			} else {
			echo "Selectionnez un bar";
			}

		?>
		<h1>Vous avez bien supprimé <?php
							echo $nom
						?> 
		</h1>
		<a href ="accueil.php" class="retour">
			Retour à l'accueil
		</a>
</body>

</html>
