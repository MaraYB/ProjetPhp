<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="style.css">
		<title>Ajout Bar</title>
	</head>
	<body>
		<h1>Contribuez au site en ajoutant votre bar favori</h1>
		<form action="ajoutbar.php" method="POST">
			Nom du bar: <input type="text" name="nom_bar"/><br/>
			Adresse: <input type="text" name="adresse_bar"/><br/>
			Code Postal: <input type="text" name="cp_ville"/><br/>
			Ville: <select name="ville">
				<?php
					$db= new SQLite3('basebar.db');
					$resultats=$db ->query('SELECT DISTINCT "ville" FROM databar ORDER BY "ville"');
					while ($row = $resultats -> fetchArray()){
						if ($row[0]){
							echo"<option value='",$row[0],"'>",$row[0], "</option> \n ";
						}
					}
				?>
				</select><br/>
			Département: <input type="text" name="departement"/><br/>
			Spécialités: <input type="text" name="specialite_bar"/><br/>
			<input type="submit" name="submit" value="Ajouter"/>
		</form>
	</body>
	<p id class="retour">
		<a href ="accueil.php">
		retour à l'accueil
		</a>
	</p>
</html>
