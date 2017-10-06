<?php
require_once('inc/init.inc.php');

// Traitement pour redit=riger l'utilisateur s'il est déjà connecté
if (!userConnecte()) {
    header('location:connexion.php');
}

extract($_SESSION['membre']);

$page = 'Profil';
require('inc/header.inc.php');
?>

<!-- Contenu HTML- -->
<h1>Profil de <?= $pseudo ?> </h1>

<div class="profil">
    <p>Bonjour <?= $pseudo ?> !! </p><br>

    <div class="profil_img">
        <img src="img/default.jpg">
    </div>

    <div class="profil_infos">
        <ul>
            <li><b>Pseudo : <?= $pseudo ?></b></li>
            <li><b>Prénom : <?= $prenom ?></b></li>
            <li><b>Nom : <?= $nom ?></b></li>
            <li><b>Email : <?= $email ?></b></li>
        </ul>
    </div>
    <div class="profil_adresse">
        <ul>
            <li>Adresse : <b><?= $pseudo ?></b></li>
            <li>Code postal : <b><?= $code_postal ?></b></li>
            <li>Ville : <b><?= $ville ?></b></li>
        </ul>
    </div>
</div>

<div class="profil">
    <h2>Détails des commandes</h2><br>
    <p>Vous n'avez pas encore passé de commande !</p><br>Vener visitez <a href="boutique.php"><u>notre boutique</u></a>
</div>


<?php
require_once('inc/footer.inc.php');
?>
