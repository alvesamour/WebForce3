<?php

$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg = '';

if(!empty($_POST)){

    if(empty($_POST['prenom'])){
      $msg .= '<p">ATTENTION Veuillez remplir le champ prenom</p>';
    }

    if(empty($_POST['nom'])){
      $msg .= '<p>ATTENTION Veuillez remplir le champ nom</p>';
    }


	if(empty($msg)){ // TOUT EST OK !!

		$resultat = $pdo -> prepare("INSERT INTO conducteur (prenom, nom) VALUES (:prenom, :nom)");

		$resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);

		if($resultat -> execute()){
			echo '<p>Vous avez été ajouté !</p>';
		}
	}
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conducteur</title>
  </head>
  <body>
    <nav>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
      <a href="vehicule.php">Véhicule</a>
    </nav><br><br>

    <form method="post">
      <?= $msg ?>
      <label>Prénom :</label><br>
      <input type="text" name="prenom"><br><br>

      <label>Nom :</label><br>
      <input type="text" name="nom"><br><br>

      <input type="submit" name="" value="Enregistrer">
    </form>
  </body>
</html>
