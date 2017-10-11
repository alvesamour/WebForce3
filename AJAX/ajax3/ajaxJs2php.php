<?php

require_once("init.inc.php");

$tab = array();
$tab['monresultat'] = '';

$resultat = $pdo -> query("SELECT * FROM employes WHERE prenom = '$_POST[personne]'");

$tab['monresultat'] .= '<table border="10">';

$tab['monresultat'] .= '<tr>';

for($i = 0; $i < $resultat->columnCount(); $i++ ){
    $colonne = $resultat->getColumnMeta($i);
    $tab['monresultat'] .= '<th>' . $colonne['name'] . '</th>';
}
$tab['monresultat'] .= '</tr>';

while($enregistrement = $resultat -> fetch(PDO::FETCH_ASSOC)){
	foreach($enregistrement as $valeur){
		$tab['monresultat'] .= '<td>' . $valeur . '</td>';

	}
	$tab['monresultat'] .= '</tr><br>';
}

// echo $tab['monresultat'];

$f = fopen('test.txt', 'a');
fwrite($f, json_encode($tab));

 echo json_encode($tab);
// json_encode permet de transformer le tableau ARRAY au bon format (JSON)
// Ce format (JSON) assure la possibilité de transporter les données. Sans JSON, nous ne pouvons pas transporter les données.
?>
