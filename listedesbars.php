<html>
    <head>
        <title>Liste des Bars</title>
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
		<h1> La Liste des Bars dans <?php echo $_POST['villes']
									?> 
		</h1>
	
		<form action="suite.php" method="POST">
			<table>
				<thead>
					<tr><th>Ville</th><th>Bar</th><th>Adresse</th><th>Spécialité du Bar</th>
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
					echo "</tr>\n";
				}
						?>
				</tbody>
			</table>
		</form>
    </body>
</html>