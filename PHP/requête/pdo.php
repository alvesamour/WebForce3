<?php
// PDO : Php Data Object

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

/*
$pdo représente un objet de la classe PDO. Il "contient" notre connexion à la base de données !

La classe PDO contient plusieurs méthodes(fonctions) pour effectuer des requêtes auprès de notre BDD. Dans ce ficheir nous allons voir la méthode query(). Et exec(), prépare() et execute() seront vues dans le fichier pdo_avance.php

Query() :
Valeurs de retour :
    -> SELECT - SHOW :
        - Succès : PDOStatement (OBJ)
        - Echec : FALSE (BOOL)

    -> INSERT - DELETE - UPDATE - REPLACE :
        - Succès : TRUE (BOOL)
        - Echec : FALSE (BOOL)
*/

// 0 : ERREUR volontaire de requête
// $pdo -> query("klhlhjh");
// par défaut les erreurs sql ne s'affichent pas. Pour les afficher on ajoute le mode d'erreur WARNING au moment de la connexion à la BDD. Ceci es une option de PDO.

// 1 : DELETE
$pdo -> query("DELETE FROM employes WHERE prenom = 'toto'");

// 2 : SELECT (un seul résultat)
$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 350");

var_dump($resultat);
// $resultat est un objet issu de la classe PDOStatement, INEXPLOITABLE en l'état.

$employe = $resultat -> fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($employe);
echo "</pre>";

echo 'Prénom : ' .$employe['prenom'];

// $resultat, notre objet PDOStatement Inexploitable, contient une fonction fetch() qui retourne les résultats de la requête sous forme d'un array.

// La fonction ou (méthode) fetch() prend plusieurs arguments possibles :
    // - PDO::FETCH_ASSOC : indexation assiocative (les nom champs deviennent les indices dans notre array)
    // - PDO::FETCH_NUM : indexation numérique (les indices sont des chiffres de 0 à N)
    // - PDO::FETCH_OBJ : indexation sous forme d'objet (les noms des champs deviennent les propriétes de l'objet)
    // - 0 argument : indexation NUM et ASSOC par défault, mais cela est raglable dans les options PDO.

// 3 : SELECT (plusieurs résultats)
$resultat = $pdo -> query('SELECT * FROM employes');
echo '<br>Nombre d\'employés : ' . $resultat -> rowCount() . '<br>'; // rowCount() nous etourne le nombre de résultats dans notre requête.

// $resultat ==> PDOStatement ==> INEXPLOITABLE

// La requête nous retourne plusieurs résultat, donc on fait le fetch() dans une boucle.

while ($employes = $resultat -> fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    print_r($employes);
    echo "</pre>";
}

// 3.2 : SELECT (plusieurs résultats + fetchAll ())

$resultat = $pdo -> query("SELECT * FROM employes");
// $resultat ==> OBJ PDOStatement ==> INEXPLOITABLE

$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($employes);
echo "</pre>";

// fetchAll() ets pratique cai ol permet de récupérer un tableau multidimentionnelle contenant tout les résultats de la requête. Cela évite de faire un fetch() dans une boucle.

// fetchAll() reçoit les mêmes arguments que fetch() ==> PDO::FETCH_ASSOC / PDO::FETCH__NUM / PDO::FETCH_OBJ / 0 arguments

// 4 : Dupliquer une table SQL en tableau HTML
$resultat = $pdo -> query("SELECT * FROM employes");
echo 'Nombre de résultats : ' . $resultat ->rowCount() . '<br><br>';

echo '<table border="1">';
echo '<tr>'; // ligne des titres

for ($i = 0; $i < $resultat -> columnCount(); $i++) {
    $colonne = $resultat -> getColumnMeta($i);
    echo '<th>' . $colonne['name'] . '</th>';
}

echo '</tr>'; // fin ligne des titres

foreach ($employes as $valeur) { // parcourt tous les enregistrement
    echo "<tr>"; // ligne pour chaque enregistrement
        foreach ($valeur as $valeur2) { // Parcourt toutes les infos de chaque enregistrement
            echo '<td>' . $valeur2 . '</td>';
        }
    echo "</tr>";
}
echo '</table>';



















?>
