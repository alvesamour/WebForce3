<?php

$msg = array();
$msg ['ville'] = '';
$msg ['cp'] = '';
$msg ['adresse'] = '';

if (!empty($_POST)) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

foreach ($_POST as $indice => $valeur) {
    if (empty($valeur)) {
        $msg[$indice] = '<p style="background:#840404; color:white; padding:5px">Veuillez renseigner le champs ' . $indice .'</p>';
    }
    else {
        echo $indice . ' : <b>' . $valeur . '</b><br>';
    }
}

    echo "Adresse saisie : <br>";
    echo "Adresse : " . $_POST['adresse'] . "<br>";
    echo "Code Postal : " . $_POST['cp'] . "<br>";
    echo "Ville : " . $_POST['ville'] . "<br>";

}

?>

<h1>Formulaire 2</h1>
<form action="" method="post">

    <?php echo $msg['ville']; ?>
    <label>Ville :</label><br>
    <input type="text" name="ville"><br><br>

    <?php echo $msg['cp']; ?>
    <label>Code postal :</label><br>
    <input type="text" name="cp"><br><br>

    <?php echo $msg['adresse']; ?>
    <label>Adresse :</label><br>
    <textarea style="rezise:none" name="adresse" rows="10" cols="30"></textarea><br><br>

    <input type="submit" value="Valider">

</form>
