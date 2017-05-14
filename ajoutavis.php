<?php
	$db = new SQLite3('baseavis.db');


	$nom = $_POST['nom_bar'];
	$avis = $_POST['avis'];
	#Comment récupérer le pseudo de celui qui laisse l'avis ? Puisqu'il est connecté on ne va pas lui demander de le mettre dans le formulaire.

	$insertion = 'INSERT INTO donnees ("nom_bar", "avis", "pseudo")'.'VALUES (\''. $nom .'\',\''. $avis .'\',\''. $pseudo .'\')';

	$db->exec($insertion);
	echo $insertion;
	echo $avis;
?>