<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Avis des contributeurs</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			if (array_key_exists('bar',$_POST)) {
			$db = new SQLite3('baseavis.db');
			$bar = $_POST['bar'];
			$avis = $db->query('SELECT "nom_bar", "avis", "pseudo" FROM donnees WHERE "nom_bar" = \'' . $bar . '\'');
				while ($row = $avis -> fetchArray()){
						echo "<table>";
						echo "<tr>";
						echo "<th>Bar</th><th>Utilisateur</th><th>Avis</th>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>",$row[0],"</td>";
						echo "<td>",$row[2],"</td>";
						echo "<td>",$row[1],"</td>";
						echo "</tr>";
						echo "</table>";
				}			
    
			} else {
			echo "<p>Il n'existe aucun avis concernant ce bar. </p>";
			}
		?>
	</body>
</html>
