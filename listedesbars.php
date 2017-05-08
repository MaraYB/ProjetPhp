<html>
    <head>
        <title>Liste des Bars</title>
    </head>
    <body>
	<h1> Voilà ce qu&apos;on trouve</h1>
	<form action="returned.php" method="POST">
<table>
<tr><th>Ville</th><th>Bar</th>
</tr>
	
		<?php
if (array_key_exists('villes', $_POST)) {
    $villes=$_POST['villes'];
} else {
    $villes=NULL;
}



$query = 'SELECT "ville", "nom_bar"'. 'FROM databar WHERE 1 ';
    
if ($villes) {
    $query = $query . 'AND "ville" = \'' . $villes . '\' ' ;
}

echo $query;

$db = new SQLite3('basebar.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
    echo "<tr>";
    echo "<td>",$row[0],"</td>";
	echo "<td>",$row[1],"</td>";
    echo "</tr>\n";
}
		?>
	</table>
	</form>
    </body>
</html>