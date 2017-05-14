<!DOCTYPE html>
<html>
	<head>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="style.css">
		 <title>Sortiebar</title>
	</head>
	<body>
	<h1>
	Choisissez un bar à supprimer
	</h1>
		<form action="supprimerbar.php" method="POST">
			<select name="bars">
				<?php
								$db= new SQLite3('basebar.db');
								$resultats=$db ->query('SELECT DISTINCT "nom_bar" FROM databar ORDER BY "nom_bar"');
								while ($row = $resultats -> fetchArray()){
									if ($row[0]){
										echo"<option value='",$row[0],"'>",$row[0], "</option> \n ";
									}
								}
							?>
			</select><br/>
			<input type="submit", name="submit", value="Suppr"/>
		</form>

	</body>
</html>