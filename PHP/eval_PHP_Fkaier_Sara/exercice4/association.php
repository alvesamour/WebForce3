<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg ='';
$contenu = '';

if (isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">L\'id N°' . $_GET['id'] . ' a été correctement modifié !</p>';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['id'])) {
    $msg .= '<p style="color: white; background: #2EB872; padding: 5px">L\'id N°' . $_GET['id'] . ' a été correctement supprimé !</p>';
}

if($_POST) // si je clique sur le bouton submit du formulaire
{
    $resultat = $pdo->prepare("UPDATE association_vehicule_conducteur SET id_vehicule = :id_vehicule, id_conducteur = :id_conducteur WHERE id_association = '$_GET[id_association]'");

    $resultat -> bindParam(':id_vehicule', $_POST['id_vehicule'], PDO::PARAM_INT);
    $resultat -> bindParam(':id_conducteur', $_POST['id_conducteur'], PDO::PARAM_INT);
    if ($resultat -> execute()) {
        header("location:association.php");
    }
}

$resultat = $pdo -> prepare("SELECT * FROM association");
$association = $resultat -> fetch(PDO::FETCH_ASSOC);
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

foreach ($association as $valeur) { // parcourt tous les enregistrement
    $contenu .= "<tr>"; // ligne pour chaque enregistrement
        foreach ($valeur as $indice => $valeur2) { // Parcourt toutes les infos de chaque enregistrement

            if ($indice != 'mdp') {

                $contenu .= '<td>' . $valeur2 . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_association='. $valeur['id_association'] .'"><img src="libs/modi.png"></a></td>';
        $contenu .= '<td><a onclick="confirm(\'Etes-vous certain de vouloir supprimer cette id' . $valeur['id_association'] . '\');" href="supprimer_association.php?id=' . $valeur['id_association'] . '"><img src="libs/supp.png"></a></td>';

    $contenu .= "</tr>";
}
$contenu .= '</table>';
$contenu .= "<br>";


if(isset($_GET['action']) && $_GET['action'] == 'modification') {


    if(isset($_GET['id_association']))
    {
    $resultat = $pdo->query("SELECT * FROM association_vehicule_conducteur WHERE id_association = '$_GET[id_association]'");
    $association_actuel = $resultat->fetch(PDO::FETCH_ASSOC);


    $id_association        =      (isset($association_actuel)) ? $association_actuel['id_association'] : '';
    $id_vehicule           =      (isset($association_actuel)) ? $association_actuel['id_vehicule'] : '';
    $id_conducteur         =      (isset($association_actuel)) ? $association_actuel['id_conducteur'] : '';
    }

    $contenu .= '<h1>Modification :</h1>

    <form method="post">

        <input type="hidden" name="$id_association" value= . ' . $id_association .'">

        <label>Véhicule :</label>
        <input type="text" name="id_vehicule" value=" ' . $id_vehicule .'" >

        <label>Conducteur :</label>
        <input type="text" name="id_conducteur" value=" ' . $id_conducteur .'" >

        <input type="submit" value="Valider">

    </form>';

}


?>

<!-- Contenu HTML -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion des associations</title>
  </head>
  <body>
    <nav>
      <a href="vehicule.php">Véhicule</a>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
    </nav>
    <h1>Gestion des associations</h1>
    <?= $contenu ?>

    <a href="../exercice3/association.php">Ajouter un véhicule ou un conducteur</a>
  </body>
</html>
