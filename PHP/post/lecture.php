<?php

// Dans le fichier formulaire4.php, nous avons vu comment enregistrer des données dans un fichier, ici nous allons voir comment les récupérer.

$fichier = file('liste.txt'); // La fonction file() fait tout le travail, elle nous retourne toutes les infos de notre fichier sous forme d'ARRAY. Chaque ligne de notre fichier correspond à un indice dans l'array.

echo "<pre>";
print_r($fichier);
echo "</pre>";


// Afficher :

foreach ($fichier as $indice => $valeur) {
    $position = strpos($valeur, ' - ');

    echo "<h5>Inscrit n °" . ($indice + 1) ."</h5>";

    echo substr($valeur, 0, $position).'<br>';
    echo substr($valeur, $position + 3).'<hr>';
}

?>
