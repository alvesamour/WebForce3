<?php
// faire le traitement pour afficher dans un tableau le nom guillaume
require_once("init.inc.php");

$tab = array();
$tab['resultat'] = '';

$resultat = $pdo -> query("SELECT * FROM employes");

$tab['resultat'] .= '<table border="10">';

$tab['resultat'] .= '<tr>';

for($i = 0; $i < $resultat->columnCount(); $i++ ){ // compter le nombre de collones
  $colonne = $resultat->getColumnMeta($i); // permet afficher les information de chaque colonne
  $tab['resultat'] .= '<th>' . $colonne['name'] . '</th>';
}

while($enregistrement = $resultat -> fetch(PDO::FETCH_ASSOC)){ // tant qu'il a un employe dans la base de donne il va faire un faire traitement permet l'affichage de l'employe


   $tab['resultat'] .= '</tr>';
    foreach($enregistrement as $valeur){
      $tab['resultat'] .= '<td>' . $valeur . '</td>';

   }
    $tab['resultat'] .= '</tr>';

}

//echo $tab['monresultat'];

// $f=fopen('test.txt', 'a');
// fwrite($f, json_encode($tab));
echo json_encode($tab);// json_encode permet de transformer le tableau array au bon format
// ce format (json) assure la possibilité de transporter les données , sans json nous ne pouvons pas transporteer les données


?>
