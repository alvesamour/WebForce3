<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

    $resultat = $pdo -> prepare("SELECT * FROM vehicule WHERE id_vehicule = :id");
    $resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute();

    if ($resultat -> rowCount() > 0) { // signifie que le produit existe
        $vehicule = $resultat -> fetch(PDO::FETCH_ASSOC);

        // supprimer le produit de la BDD :
        $resultat = $pdo -> exec("DELETE FROM vehicule WHERE id_vehicule = $vehicule[id_vehicule]");

        if($resultat) {
            header('location:vehicule.php?msg=suppr&id=' . $vehicule['id_vehicule']);
        }
    }
}



?>
