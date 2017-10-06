<?php

session_start(); // session_start() est une fonction qui va créer un fichier de session. S'il existe déjà, elle va simplement l'ouvrir.

$_SESSION['pseudo'] = 'Yakine';

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$_SESSION['email'] = 'yakine.hamida@evogue.fr';

unset($_SESSION['email']); // Vide une partie de la session !

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

session_destroy(); // Supprimer le fichier de session !! Le code est executé à la fin du script !!
