<html>
    <head>
        <title>Ajout d'un bar</title>
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
		<?php

			$db = new SQLite3('basebar.db');


			$nom = $_POST['nom_bar'];
			$adresse = $_POST['adresse_bar'];
			$code = $_POST['cp_ville'];
			$ville = $_POST['ville'];
			$departement = $_POST['departement'];
			$specialite = $_POST['specialite_bar'];

			$id = $db->querySingle('SELECT MAX("ID") FROM databar') . '0';
			$insertion = 'INSERT INTO databar ("ID", "ville", "cp_ville", "departement_ville", "nom_bar", "adresse_bar", "specialite_bar")'.'VALUES (\''. $id .'\',\''. $ville .'\',\''. $code .'\',\''. $departement .'\',\''. $nom .'\',\''. $adresse .'\',\''. $specialite.'\')';

			$db->exec($insertion);
		?>
	</body>
	<p id class="retour">
		<a href ="accueil.php">
		retour à l'accueil
		</a>
	</p>
</html>