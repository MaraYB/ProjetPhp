<?php
$redirection=header("Refresh:5;url=sortiebar.php");
?>
<!DOCTYPE html>
<html>
	<head>
	   <meta charset="utf-8"/>
	   <title>Authentification</title>
	   <meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	
		<?php
			$db = new SQLite3('baseid.db');
			$saisiepseudo=$_POST['pseudo'];
			$saisiemdp=$_POST['mdp'];
			if (array_key_exists('pseudo', $_POST) && empty($saisiepseudo == False)){
				$pseudo=$saisiepseudo;
				#echo " pseudo non nul entré ";
				if (array_key_exists('mdp', $_POST) && empty($saisiemdp == False)){
					#echo " mdp non nul entré ";
					$mdp=$saisiemdp;
					$auth = 'SELECT DISTINCT "pseudo","mdp" FROM dataid WHERE "pseudo" = \'' . $pseudo . '\' AND "mdp" = \'' . $mdp . '\' ' ;
					$resultat=$db ->query($auth);
						while($row =$resultat ->fetchArray()){
							if($mdp == $row[1] && $pseudo == $row[0]){
								echo"<h1>";
								echo "Vous etes connecté en tant que: ";
								echo $pseudo;
								echo"</h1>";
								$redirection;
								echo' <p style="text-align:center;">vous allez etre redirigé dans 5s </p>';
							}else{
								echo"Les Identifiants ne sont pas dans notre Base de données";
									
								}
						}
					}else{
						$saisiemdp=NULL;
						echo " entrez un mdp valide ";
					}
			}else{
					$saisiepseudo=NULL;
					echo " entrez un pseudo valide  ";
				};
	

			
			
			
		?> 
	</body>
</html>