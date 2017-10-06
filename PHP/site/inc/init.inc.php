<?php

// SESSION
session_start();

// CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

// VARIABLES
$msg = ''; // permet de communiquer avec les utilisateur
$page = ''; // contiendra le nom de la page en cours de visite (menu surbrillance + title de la page)
$contenu = ''; // contenu nous permettra ponctuellemnt de stocker du contenu à afficher.


// CHEMINS
define('RACINE_SITE', '/github/WebForce3/PHP/site/');


// AUTRES INCLUSIONS
require('fonctions.inc.php');




?>
