<?php

$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg = '';

if(!empty($_POST)){

	if(empty($_POST['marque'])){
		$msg .='<p">ATTENTION Veuillez remplir le champ</p>';
	}

	if(empty($_POST['modele'])){
		$msg .='<p>ATTENTION Veuillez remplir le champ</p>';
	}

	if(empty($_POST['couleur'])){
		$msg .='<p>ATTENTION Veuillez remplir le champ</p>';
	}

	if(empty($_POST['immatriculation'])){
		$msg .= '<p>ATTENTION Veuillez remplir le champ</p>';
	}

	if(empty($msg)){ // TOUT EST OK !!

		$resultat = $pdo -> prepare("INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)");

		$resultat -> bindParam(':marque', $_POST['marque'], PDO::PARAM_STR);
		$resultat -> bindParam(':modele', $_POST['modele'], PDO::PARAM_STR);
		$resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
		$resultat -> bindParam(':immatriculation', $_POST['immatriculation'], PDO::PARAM_STR);

		if($resultat -> execute()){
			$msg .= '<p>Enregistré !</p>';
		}
	}
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Véhicule</title>
  </head>
  <body>
    <nav>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
      <a href="vehicule.php">Véhicule</a>
    </nav><br><br>

    <form method="post">
			<?= $msg ?>
      <label>Marque :</label><br>
      <input type="text" name="marque"><br><br>

      <label>Modèle :</label><br>
      <input type="text" name="modele"><br><br>

      <label>Couleur :</label><br>
      <input type="text" name="couleur"><br><br>

      <label>Immatriculation :</label><br>
      <input type="text" name="immatriculation"><br><br>

      <input type="submit" name="" value="Enregistrer">
    </form>
  </body>
</html>
