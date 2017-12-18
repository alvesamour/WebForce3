<?php
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

    $resultat = $pdo -> prepare("SELECT * FROM conducteur WHERE id_conducteur = :id");
    $resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute();

    if ($resultat -> rowCount() > 0) { // signifie que le produit existe
        $conducteur = $resultat -> fetch(PDO::FETCH_ASSOC);
        // supprimer le produit de la BDD :
        $resultat = $pdo -> exec("DELETE FROM conducteur WHERE id_conducteur = $conducteur[id_conducteur]");

        if($resultat) {
            header('location:conducteur.php?msg=suppr&id=' . $conducteur['id_conducteur']);
        }
    }
}



?>
