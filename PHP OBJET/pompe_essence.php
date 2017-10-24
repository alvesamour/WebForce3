<?php

/*
Créer une class Véhicule
attribut : $litreEssence.
Méthodes : getter et setter pour $litreEssence.

Créer une class Pompe
attribut : $litreEssence.
Méthodes : getter et setter pour $litreEssence et donnerEssence ($vehicule).
donnerEssence fait le plein de la voiture (ajoute 50 litres à son réservoir) et soustrait autant de litres au réservoir de la pompe à essence.

Instancier un véhicule.
Instancier une pompe à essence.
Donner 0 litre d'essence au véhicule.
Donner 800 litres d'essence à la pompe.

Faire le plein de la voiture avec la pompe à essence
*/

// class qui contient
class VEHICULE
{
  private $litreEssence;

  public function setLitreEssence($vehicule) // set : donne une valeur à l'attribut prenom
  {
    $this->litreEssence = $vehicule;
  }
  public function getLitreEssence() // get : récupère la valeur
  {
    return $this->litreEssence;
  }
}

class POMPE
{
  private $litreEssence;

  public function setLitreEssence($vehicule) // set : donne une valeur à l'attribut prenom
  {
    $this->litreEssence = $vehicule;
  }
  public function getLitreEssence() // get : récupère la valeur
  {
    return $this->litreEssence;
  }


  // Permet de faire le plein de la voiture
  public function donnerEssence(Vehicule $vehicule) // Véhicule signifie que l'on doit passer un objet instancié de la classe vehicule
  {
    $vehicule->setLitreEssence(50); // On fait le plein de laa voiture en utilisant le setter pour litreEssence de la voiture.
    $this->setLitreEssence($this->getLitreEssence() - 50); // On retire 50 litres d'essence à la pompe.
  }
}

$vehicule = new Vehicule;
$vehicule->setLitreEssence(0);

$pompe = new Pompe;
$pompe->setLitreEssence(800);

$pompe->donnerEssence($vehicule);
var_dump($vehicule);
var_dump($pompe);



?>
