<?php

require_once("init.inc.php");

$tab = array();
$tab['monresultat'] = '';

$resultat = $pdo -> query("SELECT * FROM employes");

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

//echo $tab['monresultat'];
echo json_encode($tab);

?>
