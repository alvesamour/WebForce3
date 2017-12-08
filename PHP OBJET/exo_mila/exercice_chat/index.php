<?php
spl_autoload_register(function($class) {
 require_once 'class/' . $class . '.php';
});

/*
* => "new" est un mot clé qui permet de créer un objet d'une classe.
* On parle d'instanciation.
* Une classe peut produire plusieurs objets.
*/

$chat_1 = new Chat('Shashimi', 10, 'Gris','male', 'Persan');

echo '<strong>Chat 1</strong>';
echo '<ul>';
foreach($chat_1->getInfos() as $info){
 echo '<li>' . $info . '</li>';
}
echo '</ul>';

$chat_2 = new Chat('Bobby', 6, 'Noir', 'male', 'Mainkoun');

echo '<strong>Chat 2</strong>';
echo '<ul>';
foreach($chat_2->getInfos() as $info){
 echo '<li>' . $info . '</li>';
}
echo '</ul>';

$chat_3 = new Chat('Koukie', 3, 'Blanc', 'femelle', 'Asiatique');

echo '<strong>Chat 3</strong>';
echo '<ul>';
foreach($chat_3->getInfos() as $info){
 echo '<li>' . $info . '</li>';
}
echo '</ul>';
// -> appelle une méthode ou une valeur de la classe
//quand on appelle la propriété d'un objet on ne
// met pas le $ devant, par contre on le met quand on le déclare
