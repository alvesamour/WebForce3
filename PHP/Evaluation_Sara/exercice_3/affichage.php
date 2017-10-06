<?php

$pdo = new PDO('mysql:host=localhost;dbname=exercice3', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));


//  Une requete "SELECT * FROM movies pour afficher les champs des films"

$resultat = $pdo -> query("SELECT title, director, year_of_old FROM movies");

echo 'Film : ' . $resultat -> rowCount(); // permet de compter le nombre de film qui sont enregistrés

echo '<table border="2" color="red">';

while($enregistrement = $resultat -> fetch(PDO::FETCH_ASSOC)){
	echo '<tr>';

	foreach($enregistrement as $valeur){
		echo '<td>' . $valeur . '</td>';

	}
    echo '<td><a href="details_film.php">Plus d\'infos</a></td>';
	echo '</tr><br>';
}

echo '</table><br><br>';
