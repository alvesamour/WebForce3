<?php

switch ($_POST['operateur']) {

    case '+':
        $resultat = $_POST['champ1'] + $_POST['champ2'] ;
        break;

    case '-':
        $resultat = $_POST['champ1'] - $_POST['champ2'] ;
        break;

    case '/':
        $resultat = $_POST['champ1'] / $_POST['champ2'] ;
        break;

    default:
        $resultat = $_POST['champ1'] * $_POST['champ2'] ;
        break;
}

echo 'Le résultat est : ' . $resultat . '<br>' ;

?>
<br>
<a href="calculatrice.php">Effectuer un autre calcul</a>
