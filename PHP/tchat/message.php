<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

// traitement pour la deconnexion
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
	unset($_SESSION);
	session_destroy();
}

// traitement pour rediriger l'utilisateur s'il n'est pas connecté :
if (!isset($_SESSION['pseudo'])) {
	header('location:index.php');
}

if (isset($_POST['envoi'])) {

	if (!empty($_POST['message'])) {

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		$resultat = $pdo -> prepare("INSERT INTO message (id_membre, content, date_enregistrement) VALUES ($_SESSION[id_membre], :message, NOW())");

		$resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
		$resultat -> execute();
	}
} // !!!!!!!!!!!! FIN du if(isset($_POST['envoi']))

// requete qui va récupérer toutes les infos des messages et du membre ayant écrit le message.
// traitements pour récupérer toutes les infos de tous messages :

$resultat = $pdo -> query("SELECT membre.*, message.* FROM message LEFT JOIN membre ON message.id_membre = membre.id_membre");

$commentaires = $resultat -> fetchALL (PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tchat Fonderie</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
	</head>
	<body>
		<header>
		</header>
		<nav>
			<a class="btn" href="?action=deconnexion">Deconnexion</a>
		</nav>
		<main>
			<h1>Message</h1>

			<h2>Bonjour <?= $_SESSION['pseudo']; ?> !</h2>
			<p>Bienvue sur le tchat Fonderie, n'hésitez pas à communiquer avec nous :) </p>

					<?php foreach($commentaires as $valeur) : ?>
						<?php if($_SESSION['pseudo'] != $valeur['pseudo']) : ?>
						<div class="comment">
							<div class="triangle"></div>
							<div class="comment_in">
								<div class="img">
									<img src="photo/<?= $valeur['photo'] ?>" height="25px" />
									<p class="auteur">Par <?= $valeur['pseudo'] ?>, le <?= $valeur['date_enregistrement'] ?></p>
								</div>
								<div class="content">

									<p class="message"><?= $valeur['content'] ?></p>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div class="comment user_connecte">
							<div class="comment_in">
								<div class="img">
									<img src="photo/<?= $valeur['photo'] ?>" height="25px" />
									<p class="auteur">Par <?= $valeur['pseudo'] ?>, le <?= $valeur['date_enregistrement'] ?></p>
								</div>
								<div class="content">

									<p class="message"><?= $valeur['content'] ?></p>
								</div>
							</div>
							<div class="triangle"></div>
						</div>
					<?php endif ; ?>
					<?php endforeach; ?>

			<hr/>
			<h4>Nouveau message : </h4>
			<form method="post" action="" class="tchat">
				<textarea name="message" placeholder="Votre Message"></textarea>
				<input type="submit" name="envoi" value="Envoyer" />
			</form>

		</main>
	</body>
</html>
