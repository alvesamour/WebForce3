<?php

session_start();

$_SESSION['pseudo'] = 'Lune';
$_SESSION['prenom'] = 'Sara';
$_SESSION['nom'] = 'Fkaier';

echo "<hr>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// unset($_SESSION['nom']);
// echo "<hr>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// session_destroy();
// echo "<hr>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
