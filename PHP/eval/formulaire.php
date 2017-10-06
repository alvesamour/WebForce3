<?php

if (!empty($_POST)) {

echo "<pre>";
print_r($_POST);
echo "</pre>";

    foreach ($_POST as $indice => $valeur) {
        echo $indice . ' : <strong>' . $valeur . '</strong><br>';
    }
}

?>



<h1>Formulaire</h1>
<form action="" method="post">

    <label>Prénom :</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Adresse :</label><br>
    <textarea style="rezise:none" name="adresse"></textarea><br><br>

    <label>Ville :</label><br>
    <input type="text" name="ville"><br><br>

    <label>Code postal :</label><br>
    <input type="text" name="cp"><br><br>

    <label>Sexe :</label><br>
    <select name="sexe">
        <option>Homme</option>
        <option>Femme</option>
    </select><br><br>

    <label>Description :</label><br>
    <textarea name="description" rows="5" cols="22"></textarea><br><br>

    <input type="submit" value="Valider">

</form>
