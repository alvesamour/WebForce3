<?php

// ------------------------------ BDD
$mysqli = new Mysqli('localhost', 'root', '', 'base_site');
if ($mysqli->connect_error) die('Un problème est survenu lors de la connexion à la BDD : ' . $mysqli->connect_error);
$mysqli->set_charset("utf_8");

// ----------------------------- SESSION
session_start();

// ----------------------------- CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/github/WebForce3/PHP/revision/base_site_mysqli/");
define("URL", "http://localhost/github/WebForce3/PHP/revision/base_site_mysqli/");

// ----------------------------- Autres VARIABLES
$contenu = '';

// ----------------------------- Autres INCLUSIONS
require_once('fonctions.inc.php');

?>
