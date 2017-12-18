<?php

$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');

$msg = '';

if(!empty($_POST)){

	if(empty($_POST['id_vehicule'])){
		$msg .= '<p">ATTENTION Veuillez remplir le champ</p>';
	}

	if(empty($_POST['id_conducteur'])){
		$msg .= '<p>ATTENTION Veuillez remplir le champ</p>';
	}


	if(empty($msg)){ // TOUT EST OK !!

		$resultat = $pdo -> prepare("INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES (:id_vehicule, :id_conducteur)");

		$resultat -> bindParam(':id_vehicule', $_POST['id_vehicule'], PDO::PARAM_INT);
		$resultat -> bindParam(':id_conducteur', $_POST['id_conducteur'], PDO::PARAM_INT);

		if($resultat -> execute()){
			$msg .= '<p>Merci !</p>';
		}
	}
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Association</title>
  </head>
  <body>
    <nav>
      <a href="conducteur.php">Conducteur</a>
      <a href="association.php">Association</a>
      <a href="vehicule.php">Véhicule</a>
    </nav><br><br>

    <form method="post">
			<?= $msg ?>
      <label>Vehicule :</label><br>
      <select name='id_vehicule'>
          <option>501</option>
          <option>502</option>
          <option>503</option>
          <option>504</option>
          <option>501</option>
      </select><br><br>

      <label>Conducteur :</label><br>
      <select name='id_conducteur'>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
      </select><br><br>

      <input type="submit" name="" value="Enregistrer">
    </form>
  </body>
</html>
