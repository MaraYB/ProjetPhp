<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Bar Supprimé</title>
</head>
<body>

		<?php
			if (array_key_exists('bars',$_POST)) {
				$nom = $_POST['bars'];
				$effacer = 'DELETE from databar WHERE "nom_bar" = \'' . $nom . '\'';
				$db = new SQLite3('basebar.db');
				$results = $db -> exec($effacer);
				echo "<p>bar del.</p>";
				
			} else {
			echo "Erreur quelque Part";
			}
			echo $nom;

		?>
		<h1>Vous avez bien supprimé <?php
							echo $nom
						?> 
		</h1>
</body>
	<p id class="retour">
<a href ="accueil.php">
retour aux résultats
	</a>
</p>
</html>
