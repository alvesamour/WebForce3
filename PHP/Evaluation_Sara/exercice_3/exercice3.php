<?php

$pdo = new PDO('mysql:host=localhost;dbname=exercice3', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

if(!empty($_POST)){


	// Les vérifications du titre
	if(empty($_POST['title'])){
		$msg .= '<p style="background: red; font-weight: bold; color: white; padding: 5px">Veuillez renseigner un champs</p>';
	}
	else{
		if(strlen($_POST['title']) < 5){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : votre titre doit comporter au moins 5 caractères !</p>';
		}
	}

	// Les vérifications de l'acteur
	if(empty($_POST['actor'])){
		$msg .= '<p style="background: red; font-weight: bold; color: white; padding: 5px">Veuillez renseigner un champs</p>';
	}
	else{
		if(strlen($_POST['actor']) < 5){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : l\'acteur doit comporter au moins 5 caractères !</p>';
		}
	}

	// Les vérifications du directeur
    if(empty($_POST['director'])){
		$msg .= '<p style="background: red; font-weight: bold; color: white; padding: 5px">Veuillez renseigner un champs</p>';
	}
	else{
		if(strlen($_POST['director']) < 5){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : le directeur doit comporter au moins 5 caractères !</p>';
		}
	}

    // Les vérifications du producteur
    if(empty($_POST['producer'])){
		$msg .= '<p style="background: red; font-weight: bold; color: white; padding: 5px">Veuillez renseigner un champs</p>';
	}
	else{
		if(strlen($_POST['producer']) < 5){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : le producteur doit comporter au moins 5 caractères !</p>';
		}
	}

	// Les vérifications de la storyline

    if(empty($_POST['storyline'])){

	}
	else{
		if(strlen($_POST['storyline']) < 5){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : la storyline doit comporter au moins 5 caractères !</p>';
		}
	}

    if(empty($msg)){ // Tout est OK !!

		// Traitement pour l'enregistrement dans la BDD
		// Il y a des données sensibles dans la future requête, car nous allons insérer toutes les infos transmises, par l'utilisateur. Il peut avoir tenté des injections SQL !!
		//prepare() + execute() : DELETE-REPLACE-INSERT-UPDATE-SELECT - SHOW si données sensibles

    $resultat = $pdo -> prepare("INSERT INTO movies (id_movies, title, director, producer, year_of_old, language, category, storyline, actor, video) VALUES (:id_movies, :title, :director, :producer, :year_of_old, :language, :category, :storyline, :actor, :video) ");

    $resultat -> bindParam(':id_movies', $_POST['id_movies'], PDO::PARAM_INT);
    $resultat -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $resultat -> bindParam(':director', $_POST['director'], PDO::PARAM_STR);
    $resultat -> bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
    $resultat -> bindParam(':year_of_old', $_POST['year_of_old'], PDO::PARAM_INT);
    $resultat -> bindParam(':language', $_POST['language'], PDO::PARAM_STR);
    $resultat -> bindParam(':category', $_POST['category'], PDO::PARAM_STR);
    $resultat -> bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
    $resultat -> bindParam(':actor', $_POST['actor'], PDO::PARAM_STR);
    $resultat -> bindParam(':video', $_POST['video'], PDO::PARAM_STR);

        // Attention à ne pas oublier d'exécuter la requête
        if($resultat -> execute()){

            $msg .= '<p style="color: white; background: green; padding: 5px">Félicitations, le film a été ajouté !</p>';
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercice 3</title>
    </head>
    <body>

    </body>
	<form method="post" action="">
	 <?= $msg ?>
		<fieldset>
			<legend>Ajouter un film</legend>

			<label for="title">Title :</label><br>
			<input type="text" name="title" value=""><br><br>

			<label for="director">Director :</label><br>
			<input type="text" name="director" value=""><br><br>

			<label for="producer">Producer :</label><br>
			<input type="text" name="producer" value=""><br><br>

            <label for="year_of_old">Year of old :</label><br>
            <select name="year_of_old">
                <?php for($i = date("Y"); $i >= 1900; $i--) {

						if($i == $_POST['year_of_old']){
							$sel = 'selected';
						}
						else{
							$sel ='';
						}
						echo '<option ' . $sel .  ' >' .  $i . '</option>';

					     }	?>
            </select><br><br>

			<label for="language">Language :</label><br>
            <select name="language">
				<option value="français">Français</option>
				<option value="anglais">Anglais</option>
				<option value="espagnol">Espagnol</option>
				<option value="espagnol">Italien</option>
            </select><br><br>

			<label for="category">Category :</label><br>
            <select name="category">
				<option value="horreur">Horreur</option>
				<option value="romantique">Romantique</option>
				<option value="thriller">Thriller</option>
				<option value="action">Action</option>
            </select><br><br>

            <label for="storyline">Storyline :</label><br>
			<textarea name="storyline" cols="16"></textarea><br><br>

			<label for="actor">Actor :</label><br>
			<input type="text" name="actor"><br><br>

            <label for="video">Video :</label><br>
			<input type="text" name="video"><br><br>

			<input type="submit" name="envoyer" value="Envoyer">

        </fieldset>
	</form><br><br>
	<a href="affichage.php">Etape 3</a>
</html>
