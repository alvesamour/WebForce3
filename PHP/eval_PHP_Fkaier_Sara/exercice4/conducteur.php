<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg ='';
$contenu = '';

if (isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">Le conducteur N°' . $_GET['id'] . ' a été correctement modifié !</p>';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">Le conducteur N°' . $_GET['id'] . ' a été correctement supprimé !</p>';
}

if($_POST) // si je clique sur le bouton submit du formulaire
{
    $resultat = $pdo->prepare("UPDATE conducteur SET prenom = :prenom, nom = :nom WHERE id_conducteur = '$_GET[id_conducteur]'");

    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);

    if ($resultat -> execute()) {
        header("location:conducteur.php");
    }
}

$resultat = $pdo -> query("SELECT * FROM conducteur");
$conducteur = $resultat -> fetchAll(PDO::FETCH_ASSOC);
$contenu .= 'Nombre de résultats : ' . $resultat ->rowCount() . '<br><hr>';

$contenu .= $msg;
$contenu .= '<table border="1">';
$contenu .= '<tr>'; // ligne des titres

for ($i = 0; $i < $resultat -> columnCount(); $i++) {
    $colonne = $resultat -> getColumnMeta($i);
     if($colonne['name'] != 'mdp') {
         $contenu .= '<th>' . $colonne['name'] . '</th>';
    }
}

$contenu .= '<th colspan="2">Actions</th>';
$contenu .= '</tr>'; // fin ligne des titres

foreach ($conducteur as $valeur) { // parcourt tous les enregistrement
    $contenu .= "<tr>"; // ligne pour chaque enregistrement
        foreach ($valeur as $indice => $valeur2) { // Parcourt toutes les infos de chaque enregistrement

            if ($indice != 'mdp') {

                $contenu .= '<td>' . $valeur2 . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_conducteur='. $valeur['id_conducteur'] .'"><img src="libs/modi.png"></a></td>';
        $contenu .= '<td><a onclick="confirm(\'Etes-vous certain de vouloir supprimer ce conducteur' . $valeur['id_conducteur'] . '\');" href="supprimer_conducteur.php?id=' . $valeur['id_conducteur'] . '"><img src="libs/supp.png"></a></td>';

    $contenu .= "</tr>";
}
$contenu .= '</table>';
$contenu .= "<br>";


if(isset($_GET['action']) && $_GET['action'] == 'modification') {


    if(isset($_GET['id_conducteur']))
    {
    $resultat = $pdo->query("SELECT * FROM conducteur WHERE id_conducteur = '$_GET[id_conducteur]'");
    $conducteur_actuel = $resultat->fetch(PDO::FETCH_ASSOC);


    $id_conducteur         =      (isset($conducteur_actuel)) ? $conducteur_actuel['id_conducteur'] : '';
    $prenom                =      (isset($conducteur_actuel)) ? $conducteur_actuel['prenom'] : '';
    $nom                   =      (isset($conducteur_actuel)) ? $conducteur_actuel['nom'] : '';
    }

    $contenu .= '<h1>Modification :</h1>

    <form class="coucou" action="" method="post">

        <input type="hidden" name="$id_conducteur" value= . ' . $id_conducteur .'">

        <label>Prénom :</label>
        <input type="text" name="prenom" value=" ' . $prenom .'" >

        <label>Nom :</label>
        <input type="text" name="nom" value=" ' . $nom .'" >

        <input type="submit" value="Valider">

    </form>';

}

?>

<!-- Contenu HTML -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion des conducteurs</title>
  </head>
  <body>
    <nav>
      <a href="vehicule.php">Véhicule</a>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
    </nav>
    <h1>Gestion des conducteurs</h1>
    <?= $contenu ?>

    <a href="../exercice3/conducteur.php">Ajouter un conducteur</a>
  </body>
</html>
