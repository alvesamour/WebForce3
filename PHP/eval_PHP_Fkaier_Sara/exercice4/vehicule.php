<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg ='';
$contenu = '';

if (isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">Le véhicule N°' . $_GET['id'] . ' a été correctement modifié !</p>';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">Le véhicule N°' . $_GET['id'] . ' a été correctement supprimé !</p>';
}

if($_POST) // si je clique sur le bouton submit du formulaire
{
    $resultat = $pdo->prepare("UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id_vehicule = '$_GET[id_vehicule]'");

    $resultat -> bindParam(':marque', $_POST['marque'], PDO::PARAM_STR);
    $resultat -> bindParam(':modele', $_POST['modele'], PDO::PARAM_STR);
    $resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
    $resultat -> bindParam(':immatriculation', $_POST['immatriculation'], PDO::PARAM_STR);

    if ($resultat -> execute()) {
        header("location:vehicule.php");
    }
}

$resultat = $pdo -> query("SELECT * FROM vehicule");
$vehicule = $resultat -> fetchAll(PDO::FETCH_ASSOC);
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

foreach ($vehicule as $valeur) { // parcourt tous les enregistrement
    $contenu .= "<tr>"; // ligne pour chaque enregistrement
        foreach ($valeur as $indice => $valeur2) { // Parcourt toutes les infos de chaque enregistrement

            if ($indice != 'mdp') {

                $contenu .= '<td>' . $valeur2 . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_vehicule='. $valeur['id_vehicule'] .'"><img src="libs/modi.png"></a></td>';
        $contenu .= '<td><a onclick="confirm(\'Etes-vous certain de vouloir supprimer ce vehicule' . $valeur['id_vehicule'] . '\');" href="supprimer_vehicule.php?id=' . $valeur['id_vehicule'] . '"><img src="libs/supp.png"></a></td>';

    $contenu .= "</tr>";
}
$contenu .= '</table>';
$contenu .= "<br>";


if(isset($_GET['action']) && $_GET['action'] == 'modification') {


    if(isset($_GET['id_vehicule']))
    {
    $resultat = $pdo->query("SELECT * FROM vehicule WHERE id_vehicule = '$_GET[id_vehicule]'");
    $vehicule_actuel = $resultat->fetch(PDO::FETCH_ASSOC);


    $id_vehicule        =      (isset($vehicule_actuel)) ? $vehicule_actuel['id_vehicule'] : '';
    $marque             =      (isset($vehicule_actuel)) ? $vehicule_actuel['marque'] : '';
    $modele             =      (isset($vehicule_actuel)) ? $vehicule_actuel['modele'] : '';
    $couleur            =      (isset($vehicule_actuel)) ? $vehicule_actuel['couleur'] : '';
    $immatriculation    =      (isset($vehicule_actuel)) ? $vehicule_actuel['immatriculation'] : '';
    }

    $contenu .= '<h1>Modification :</h1>

    <form method="post">

        <input type="hidden" name="$id_vehicule" value= . ' . $id_vehicule .'">

        <label>Marque :</label>
        <input type="text" name="marque" value=" ' . $marque .'" >

        <label>Modele :</label>
        <input type="text" name="modele" value=" ' . $modele .'" >

        <label>Couleur :</label>
        <input type="text" name="couleur" value=" ' . $couleur .'" >

        <label>Immatriculation :</label>
        <input type="text" name="immatriculation" value=" ' . $immatriculation .'" >

        <input type="submit" value="Valider">

    </form>';

}


?>

<!-- Contenu HTML -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion des véhicule</title>
  </head>
  <body>
    <nav>
      <a href="vehicule.php">Véhicule</a>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
    </nav>
    <h1>Gestion des véhicules</h1>
    <?= $contenu ?>

    <a href="../exercice3/vehicule.php">Ajouter un véhicule</a>
  </body>
</html>
