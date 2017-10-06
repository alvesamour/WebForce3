<h2>Ecriture et affichage</h2>
<!-- Première chose : On constate que l'on peut écrire de l'HTML dans un fichier PHP ! (l'inverse n'est pas possible) -->

<?php
echo "Bonjour"; // Echo est une instruction qui nous permet d'effectuer un affichage.
echo "<br>"; // Nous pouvous également générer l'affichage d'HTML grâce à echo.

echo "<h2>Les commentaires :</h2>";
echo "texte"; // Ceci est un commentaire sur une ligne
echo "<br>texte"; /* Ceci est un commentaire sur plusieurs lignes... */

echo "<h2>Les variables : Types, déclarations et affectation :</h2>";

$a = 127; // Affectation de la valeur 127 dans la variable a.
echo gettype($a); // entier(INTEGER)

$b = 1.5;
echo "<br>".gettype($b); // Chiffre à virgule (DOUBLE)

$c = "Chaîne de caractères";
echo "<br>".gettype($c); // Chaine de caractères (STRING)

$d = TRUE;
echo "<br>".gettype($d); // Bolléen (BOOLEAN)

// $ma-super-variable; // le '-' est utiliser pour la soustraction
// $ma super variable; // Erreur : pas d'espace

$ma_super_variable = 1; // OK ! snake_case
$maSuperVariable = 1; // OK ! camelCase
$MaSuperVariable = 1; // OK ! StreadyCase // PascalCase

// $prénom = 'Sara'; // Pas d'accent dans les noms
$prenom = 'Yakine'; // OK !
$prenom1 = 'Pascal'; // OK !
//$2prenom = 'Johan'; // Erreur : les noms des varaibles ne peuvent pas commencer par un chiffre.

echo "<h2>La concaténation :</h2>";
$x = "Bonjour ";
$y = "tout le monde !";

echo $x.$y.'<br>'; // On peut traduire le '.' par 'suivi de';
echo "$x $y <br>"; // même chose sans concaténation

echo "Hey ! " . $x . $y . '<br>';
echo "Hey ! " , $x , $y , '<br>'; // La concaténation existe aussi avec ',' mais est très peu utilisée.

echo '<h2>Concaténation lors de l\'affectation :</h2>';

$prenom1 = 'Bruno'; // Affectation de la valeur Bruno.
$prenom1 = 'Claire'; // Affectation de la valeur Claire qui remplace Bruno.

$prenom2 = 'Nicolas'; // Affectation de la valeur Nicolas
$prenom2 .= 'Marie'; // Affectation de la valeur Marie, cela ajoute la valeur Marie

echo $prenom2;

/* Explication :
Fait ceci : $prenom2 = $prenom2 . 'Marie';
            $prenom2 = 'Nicolas'. 'Marie';
*/

echo "<h2>Guillemets et quotes :</h2>";

$jour = "Aujourd'hui";
$jour = 'Aujourd\'hui'; //  Attention, entre quote, les apostrophes peuvent faire échapper la chaîne de caractère

$txt = "Bonjour";

echo $txt . 'Tout le monde ! <br>';
echo $txt . "Tout le monde ! <br>";

echo "$txt tout le monde !<br>";
echo '$txt tout le monde !<br>'; // entre quote, les variables ne sont pas évaluées, mais simplement considérées comme des chaîne de caractères

echo "<h2>Contantes et constantes magiques :</h2>";
// une constante tout comme une variable permet de stocker une valeur, la différence se situe dans le fait qu'on ne puisse pas modifier la valeur d'une constante. Elle est... CONSTANTE !

define('CAPITALE', 'Paris');
echo CAPITALE . '<br>';
/*
define() est la fonction qui nous permet de créer une constante. Elle attend deux arguments :
    1 : Le nom de la constante en MAJ (STRING)
    2 : La valeur stockée
*/

// Les contantes magiques :
echo __DIR__ . '<br>'; // le dossier dans lequel nous sommes
echo __FILE__ . '<br>'; // le fichier dans lequel nous sommes
echo __LINE__ . '<br>'; // la ligne dans laquelle nous sommes

// __FUNCTION__ , __CLASS__ , __ METHOD__ : orienté objet

// Exercices :

// 1 : Afficher 'Bonjour Sara FKAIER'

$prenom = 'Sara';
$nom = 'FKAIER';

echo '<p style="color:red">Bonjour '.$prenom.' '.$nom. '</p><br>';

// 2 : Afficher : 'Bleu - Blanc - Rouge', en utilisant 3 variables (une pour chaque couleur) et la concaténation

$bleu = "blanc";
$blanc = 'blanc';
$rouge = 'rouge';

echo $bleu.' - '.$blanc.' - '.$rouge . '<br>';

echo "<h2>Opérateurs Arithmétiques :</h2>";

$a = 10;
$b = 2;

echo $a + $b.'<br>'; // Affiche 12;
$c = $a + $b.'<br>';
echo $c;

echo $a - $b.'<br>'; //Affiche 8;
echo $a * $b.'<br>'; //Affiche 20;
echo $a / $b.'<br>'; //Affiche 5;
echo $a % $b.'<br>'; //Affiche 0;

// Opération et affectation :
 $a = 10;
 $b = 2;

 $a += $b; // $a = $a + $b // A : 12;
 $a -= $b; // A : 10;
 $a *= $b; // A : 20;
 $a /= $b; // A : 10;

 echo "<h2>Les structures conditionnelles :</h2>";
// empty() : teste si c'est vide, False ou égal à 0
// isset() : teste si quelque chose existe

$var1 = 0; // False
$var2 = 'Mon prénom';
$var3 = '';

if(true) {

    // intruction à exécuter
}

// if, eslse, elseif
$a = 10;
$b = 5;
$c = 2;

if($a > $b) { // Si A est supérieur à B
    echo "Oui A est supérieur à B <br>";
}
else{ // Sinon (A est inférieur ou égal à B)
    echo "Non A n'est pas supérieur à B <br>";
}

if ($a > $b && $b > $c) { // Si A est supérieur à B et que dans le même temps B est supérieur à C
    echo "Ok pour les deux conditions <br>";
}

//  true && true ===> true
//  true && false ===> false
//  false && true ===> false
//  false && false ===> false

if($a == 9 || $b > $c) { // si A contient la valeur 9 ou ue B est supérieur à C
    echo "Ok pour au moins une des deux conditions <br>";
}

//  true || true ===> true
//  true || false ===> true
//  false || true ===> true
//  false || false ===> false

if($a == 10 XOR $b == 6) { // Si A contient la valeur 10 ou SOIT B contient la valeur 6 (condition exclusive)
    echo "Ok pour seulement l'une des deux conditions";
}

//  true XOR true ===> false
//  true XOR false ===> true
//  false XOR true ===> true
//  false XOR false ===> false

$a = 10;

if($a == 8) {
    echo "A conteint la valeur 8<br>";
}
elseif ($a != 10) {
    echo "A est différent de 10<br>";
}
else {
    echo "A contient la valeur 10<br>";
}

// = --> Affectation
// == --> Comparaison
// === --> Stricte Comparaison (différent type (chaine de caractère ou chiffre))

echo "<h2>Condition switch :</h2>";

$couleur = 'bleu';

switch ($couleur) {
    case 'bleu':
        echo "Vous aimez le bleu<br>";
        break;

    case 'rouge':
        echo "Vous aimez le rouge<br>";
        break;

    case 'vert':
        echo "Vous aimez le vert<br>";
        break;

    default:
        echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert<br>";
        break;
}

// Exercice : Faire la même chose mais avec un if, elseif, else..

if($couleur == 'bleu') {
    echo "Vous aimez le bleu<br>";
}
elseif ($couleur == 'vert') {
    echo "Vous aimez le vert<br>";
}
elseif ($couleur == 'rouge') {
    echo "Vous aimez le rouge<br>";
}
else {
    echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert<br>";
}

echo "<h2>Fonctions prédéfinies :</h2>";
// les fonctions prédéfinies existent dans le language et permettent d'effectuer des traitements spécifiques. Il en existe plusieurs centaines... Doc officielle PHP : php.net

echo date('d/m/Y h:i:s'); // Date() nous permet de récupérer la date du jour, et attend un argument (STRING) le format pour récupérer la date.

echo "<h2>Fonctions prédéfinies sur les chaînes de caractères :</h2>";

$email = 'sarafkaier@hotmail.fr';

 echo "<br>".strpos($email, '@'); //strops() (string position) nous retourne l'emplacement d'un caractère dans une chaîne de caractère.

/*
2 arguments :
    1 : la chaîne de caractère sur laquelle on travaille
    2 : le ou les caractère(s) cherchés

valeur de retour :
    Succès : N (INT)
    Echec : False (BOOL)
*/
echo "<br>";

$phrase = "Il fait pas beau aujourd'hui";

echo strlen(utf8_decode($phrase)); //strlen() (string length) nous retourne le nombre de caractères dans une chaîne de caractères. Plus précisement cela compte la ressource en nombre d'octets. utf8_decode() 1 caractère = 1 octet.
/*
1 argument : la chaîne de caractères en question

Valeurs de retour :
    Succès : N (INT)
    Echec : FALSE (Bool)
*/
echo "<br>";

$texte ="At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.";

echo substr($texte, 0, 40) .'...<a href="">Lire la suite</a>'; // substr() (sub string) nous retourne une partie d'une chaîne de caratère.

/*
3 arguments :
    1 : La CC
    2 : Le point de départ
    3 : Le nombre de caractères (optionnel)

Valeur de retour :
    Succès : XXXXXXX (STR)
    Echec : FALSE (BOOL)
*/

echo "<h2>Les fonctions utilisateurs :</h2>";

// Les fonctions utilisateurs nous permettent d'effecteur des traitements qui ne sont pas prédéfinies dans le language. Elles sont d'abord déclarées puis exécutées.

// 1/ Fonctions pour afficher 'Bonjour' :

// Déclaration :
function bonjour() {
    // traitements/instructions...
    echo "Bonjour !";
}

// Exécution :
bonjour();

echo "<br>";

// 2/ Fonction pour afficher 'Bonjour Hadi' :

// Déclaration :
function bonjourPrenom($arg) {
    // traitements/instructions...
    echo "Bonjour " . $arg . " !<br>";
}

// Exécution :
bonjourPrenom('Meryem');
bonjourPrenom('Pascal');
bonjourPrenom('Yakine');
bonjourPrenom('Barbara');

$prenom = 'Sara';
bonjourPrenom($prenom);

// 3/ Fonction pour affivher un titre h2 :

// Déclaration :
function titre($arg) {
    // traitements/instructions...
    echo "<h2>" . $arg . "</h2>";
}

// Exécution :


// 4/ Fonction pour appliquer la TVAà un prix HT :

// Déclaration :
function appliqueTva($prixHt) {
    // traitements/instructions...
    return $prixHt * 1.2;
}

// Exécution :
$montantHt = 164;

echo 'Le montant de votre commande HT, '. $montantHt .' s\'élève à '. appliqueTva($montantHt) . '€ TTC ! <br>';

// Exercice :

// Créer une fonction applique TVA 2, qui va nous retourner un prix TTC, converti soit avec un taux de 20% (1.2) soit 10% (1.1) soit 5.5% (1.055).

// ------> Une fonction peut recevoir 2 arguments ou plus...

function appliqueTva2($prix, $taux) {

    return $prix * $taux;
}
echo appliqueTva2(187, 1.055);

titre('Inclusions de fichier :');

// Les inclusions permettent d'inclure des fichiers. Exemple : On peut inclure des parties communes d'un site (compartiment_site), on peut également inclure du code PHP.

// include() : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs, et continue le script.

// require() : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs, et stop le script.

// include_once() : Même include(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seule fois.

// require_once() : Même require(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seule fois.

titre('Structure interactive : les boucles :');

// While :

$i = 0;
while($i < 3) {
    // traitements à effectuer
    echo $i . '---';
    $i ++;
}

echo "<br>";
// Exercice :

// Faire la même chose qui affiche : 0---1---2

$i = 0;
while($i < 3) {
    // traitements à effectuer
    if($i == 2) {
        echo $i;
    }
    else {
        echo $i .'---';
    }
    $i++;
}

echo "<br><br>";

echo "Boucle FOR :<br><br>";
// boucle for

for ($i = 0; $i < 3; $i++) {
    echo $i . '---';
}

echo "<br>";

// Exercice 1 : Afficher de 0 à 9 grâce à boucle for (0123456789)

for ($a = 1; $a < 10; $a++) {
    echo $a . '<br>';
}

echo "<br>";

// Exercice 2 : Aficher de 0 à 9 dans un tableau

echo '<table border="1">';
echo "<tr>";
for ($a = 1; $a < 10; $a++) {
    echo '<td>'. $a .'</td>';
}
echo "</tr>";
echo "</table>";

echo "<br>";
// Exercice 3 : Afficher un tableau avec 10 lignes allant de 0 à 99 (chaque ligne 0-9 // 10-19 ... 90 à 99).

echo '<table border="1">';
for ($a = 0; $a <= 9; $a++) {
    echo "<tr>";
    for ($b = 0 ; $b <= 9 ; $b++) {
        echo '<td>'. ($a * 10 + $b) .'</td>';
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>";

// Modulo
echo '<table border="1">';
echo "<tr>";
for ($i=0; $i <=99 ; $i++) {
    if ($i%10 == 0) {
        echo "<tr></tr>";
    }
    echo '<td>'. $i .'</td>';
}
echo "</tr>";
echo '</table>';

titre('Tableau de donnée ARRAY :');

// Un tableau de donnée array, est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une seule valeur mais plusieurs. Les valeurs seront classées...

$liste = array('Yakine', 'Hadi', 'Meryem', 'Corinne', 'Pascal');

//echo $liste; // ERREUR : On ne peut pas faire un echo sur array

echo "<pre>";
print_r($liste);
echo "</pre>";

titre('Les boucles Foreach pour les ARRAY');

// Les boucles foreach sont un moyen simple de passer en revue un tableau de donnée array. Foreach fonctionne UNIQUEMENT avec les arrays (et les objets).

$tab[] = "France";
$tab[] = "Espagne";
$tab[] = "Japon";
$tab[] = "Angleterre";
$tab[] = "Canada";

echo "<pre>";
print_r($tab);
echo "</pre>";

echo $tab[2];
$tab[4] = "Suisse";
$tab[] = "Allemagne";

echo "<pre>";
print_r($tab);
echo "</pre>";

 echo "Boucle foreach : <br>";
 foreach($tab as $valeur) { // Le foreach se comporte comme un curseur qui va parcourir tous les éléments d'un array. Le mot AS fait partie du language et est OBLIGATOIRE. $valeur va contenir à chaque tour de boucle la valeur trouvée dans l'array.

     echo $valeur . '<br>';
}
echo "<br>";

foreach ($tab as $indice => $valeur) { // S'il y a deux variables ($indice => $valeur) dans les paramètres de la boucle foreach, le premier parcours les indices et le second parcours les valeurs.
    echo 'A l\'indice : ' . $indice . ' se trouve la valeur : ' . $valeur . '<br>';
}

// Création d'un array avec indices choisis :

$couleur = array(
    "couleur1" => 'Jaune',
    "couleur2" => 'Rouge',
    "couleur3" => 'Vert'
);

echo "<pre>";
print_r($couleur);
echo "</pre>";

titre('Les tableaux multidimentionnel :');

$tab_multi = array(
    0 => array(
        'prenom' => 'Hadi',
        'nom' => 'Smail'
    ),
    1 => array(
        'prenom' => 'Meryem',
        'nom' => 'Boularouk'
    )
);

echo "<pre>";
print_r($tab_multi);
echo "</pre>";

?>
