<?php
require_once ('init.inc.php');

// réaliser une requête d'insert permettant d'insérer un prénom dans la BDD via le formulaire HTML
$resultat = $pdo -> query("INSERT INTO employes (prenom) VALUES ('$_POST[personne]')");

?>
