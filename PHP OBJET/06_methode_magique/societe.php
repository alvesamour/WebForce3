<?php

class Societe
{
  public $adresse;
  public $ville;
  public $cp;

  public function __set($nom, $valeur)
  {
    echo "La propriété $nom n'existe PAS et la valeur $valeur n'a donc pas été affectée.";
  }

  public function __get($nom)
  {
    echo " La propriété $nom n'existe pas, je ne peux donc pas l'afficher.";
  }

  public function __call($nom, $arguments)
  {
    echo " Tentative d'exécuter la méthode $nom mais elle n'existe pas. Les arguments étaient " . implode(', ', $arguments) . '.';
  }
}

$societe = new Societe;
$societe->ville = 'Paris';
$societe->pays = 'France'; // La propriété n'existe pas, on déclenche la méthode magique __set() au lieu de créer une nouvelle propriété.
echo $societe->pays; // La propriéte n'existe pas, on déclenche la méthode magique __set() au lieu d'afficher une propriéré qui n'existe pas.
$societe->dfghjk(1, 2, 3); // La méthode n'existe pas, déclenche

?>
