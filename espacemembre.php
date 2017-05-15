<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Espace Membre</h1>
		<form action="supprimeravis.php" method="POST">
			<table>
				<thead>
					<th>Historique des avis</th><th>Supprimer cet avis</th>
				</thead>
				<tbody>
					<?php
						session_start();
						$pseudo = $_SESSION['pseudo'];
						$db = new SQLite3('baseavis.db');
						$historique = $db->query('SELECT "avis" FROM donnees WHERE "pseudo" = \'' . $pseudo . '\'');
		
							while ($row = $historique -> fetchArray()){
								echo "<tr>";
								echo "<td>",$row[0],"</td>";
								echo "<td>","<input type='radio' value='",$row[0],"' name='avis' id='avis'>","</td>";
								echo "</tr>";			
							}
					?>
				</tbody>
			</table>
		</form>
		
		<h1>Ajoutez un avis.</h1>
		
		<form action="ajoutavis.php" method="POST">
			Nom du bar : <input type="text" name="nom_bar"/><br/>
			<p><label for="avis">
			Donnez votre avis ici:
			</label><br/>
			<textarea name="avis" id="avis"></textarea></p>
			<input type="submit" name="submit" value="Ajouter"/>
		</form>
		
		<h1>Recherche de bar</h1>
		
		<div name ="debut">
			<form action="listedesbars.php" method="POST">
				<select name="villes">
					<?php
						$db= new SQLite3('basebar.db');
						$resultats=$db ->query('SELECT DISTINCT "ville" FROM databar ORDER BY "ville"');
						while ($row = $resultats -> fetchArray()){
							if ($row[0]){
								echo"<option value='",$row[0],"'>",$row[0], "</option> \n ";
							}
						}
					?>
				</select>
				<input type="submit", name="cherche" value="Cherche moi un bar" />
			</form>
		</div>		
	</body>
</html>