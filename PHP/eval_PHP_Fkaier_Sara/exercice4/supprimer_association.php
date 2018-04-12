<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

    $resultat = $pdo -> prepare("SELECT * FROM association WHERE id_association = :id");
    $resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute();

    if ($resultat -> rowCount() > 0) { // signifie que le produit existe
        $association = $resultat -> fetch(PDO::FETCH_ASSOC);

        // supprimer le produit de la BDD :
        $resultat = $pdo -> exec("DELETE FROM association WHERE id_association = $association[id_association]");

        if($resultat) {
            header('location:association.php?msg=suppr&id=' . $association['id_association']);
        }
    }
}
?>
