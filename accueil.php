<html>
    <head>
        <title>Page d'acceuil</title>
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<h1>
			Trouvons un Bar !!
		</h1>
		<div id="membre" > Déja membre ?
			<form action ="authentification.php" method ="POST">
				Pseudo:<input type="text" , name="pseudo"> </br>
				Mot de passe:<input type="password" , name="mdp">
				</br>
				<input type="submit", name="connection" value="se connecter" />
			</form>
		</div>
		<p style="margin-top:9cm">
			<a href="inscription.html" class="inscription"> Rejoins notre communauté ! </a>
			</p>
		<div id ="rechercher">
			<form action="listedesbars2.php" method="POST">
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