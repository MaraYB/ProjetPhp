<html>
    <head>
        <title>Liste des Bars</title>
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
		<h1> La Liste des Bars dans <?php echo $_POST['villes']
									?> 
		</h1>
	
		<form action="avis.php" method="POST">
			<table>
				<thead>
					<tr><th>Ville</th><th>Bar</th><th>Adresse</th><th>Sp&#233cialit&#233 du Bar</th><th><input type="submit" value="Voir les avis"/></th>
					</tr>
				</thead>
				<tbody>
						<?php
				if (array_key_exists('villes', $_POST)) {
					$villes=$_POST['villes'];
				} else {
					$villes=NULL;
				}



				$query = 'SELECT "ville", "nom_bar", "adresse_bar" ,"specialite_bar"'. 'FROM databar WHERE 1 ';
					
				if ($villes) {
					$query = $query . 'AND "ville" = \'' . $villes . '\' ' ;
				}

				$db = new SQLite3('basebar.db');
				$results = $db->query($query);

				while ($row = $results->fetchArray()) {
					echo "<tr>";
					echo "<td>",$row[0],"</td>";
					echo "<td>",$row[1],"</td>";
					echo "<td>",$row[2],"</td>";
					echo "<td>",$row[3],"</td>";
					echo "<td>","<input type='radio' value='",$row[1],"' name='bar' id='bar'>","</td>"; #bouton à tester pour aller vers la page avis				
					echo "</tr>\n";
				}
						?>
				</tbody>
			</table>
		</form>
		<form action="entreebar.php" method="POST">
			<p> Ajoutez votre bar pr&#233f&#233r&#233 ? </p>
			<input type="submit" name="ajout" value ="Ajouter un Bar">
		</form>
		<form action ="supprimerbar.php" method="POST">
			<p> Vous avez vu un bar qui a ferm&#233 r&#233cemment ? </p>
			<input type="submit" name="supprimer" value ="Supprimer un Bar">
		</form>
	</body>
	<p id class="retour">
		<a href ="accueil.php">
		retour à l'accueil
		</a>
	</p>
</html>
