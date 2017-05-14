<html>
    <head>
        <title>Page d'acceuil</title>
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
		<h1>
			Bienvenue
		</h1>
			<?php
				$newpseudo=$_POST['newpseudo'];
				$newmdp=$_POST['newmdp'];
				$db= new SQLite3('baseid.db');
				$auth = 'SELECT DISTINCT "pseudo","mdp" FROM dataid WHERE "pseudo" = \'' . $newpseudo . '\' AND "mdp" = \'' . $newmdp . '\' ' ;
				$resultat=$db ->query($auth);	
				$newid = $db->querySingle('SELECT MAX("ID") FROM dataid') . '0';
				$insertion = 'INSERT INTO dataid ("ID", "pseudo" , "mdp")'.'VALUES (\''. $newid .'\',\''. $newpseudo .'\',\''. $newmdp .'\')';
				$row =$resultat ->fetchArray();
					if ($newpseudo == $row[0] || $newmdp == $row[1]){
						echo "Ces Identifiants sont déja pris";

				}else{
						$db->exec($insertion);
						echo "succes";
						echo $row[1];
						echo "</br>";
						echo $newpseudo;
						echo "</br>";
						echo $newid;
					}
				
			?>
	</body>
</html>