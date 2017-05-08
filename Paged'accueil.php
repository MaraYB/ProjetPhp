<html>
    <head>
        <title>page d'acceuil</title>
    </head>

    <body>
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
			<input type="submit", name="GO" value="Cherche moi un bar" />
        </form>
    </body>
</html>