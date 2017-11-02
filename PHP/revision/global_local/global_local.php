<?php

function jourSemaine() {
  $jourLocal = "lundi"; // Variable locale.
  return $jourLocal;
  echo "Allô";
}
$jourGlobal = jourSemaine();
echo $jourGlobal;
echo "<hr>";

// --------------------------
$pays = "France";
function affichagePays() {
  global $pays;
  echo $pays;
}

affichagePays();
?>
