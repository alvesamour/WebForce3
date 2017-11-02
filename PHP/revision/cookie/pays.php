<?php

if(isset($_GET['pays'])) {
    $pays = $_GET['pays'];
}
elseif(isset($_COOKIE['pays'])) {
    $pays = $_COOKIE['pays'];
}
else {
    $pays = 'fr';
}
$an = 365 * 24 * 3600;

setCookie('pays', $pays, time() + $an);

switch ($pays) {
    case 'fr':
        echo "Bonjour, bienvenue";
        break;

    case 'es':
        echo "Hola, bienvenido !";
        break;

    case 'it':
        echo "Buonjorno, benvenuto !";
        break;

    case 'an':
        echo "Hi, you're welcome!";
        break;
}

?>

<html>
  <h1>Votre language :</h1>
    <ul>
        <li><a href="?pays=fr">France</a></li>
        <li><a href="?pays=es">Espagne</a></li>
        <li><a href="?pays=it">Italie</a></li>
        <li><a href="?pays=an">Angleterre</a></li>
    </ul><hr>
</html>
