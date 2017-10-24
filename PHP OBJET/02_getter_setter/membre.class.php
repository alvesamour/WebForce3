<?php
// Membre.class.php

// Exercice : au vu de cette classe vous aller devoir écrire les setters et les getter pour cette class.

class MEMBRE
{
  private $prenom;
  private $nom; // Déclaration des propriétés (ou attributs)

  // Ce code est ececuté à chaque instancation d'un objet
  public function __construct($arg1, $arg2)
  {
    $this->setNom($arg1);
    $this->setPrenom($arg2);
  }

  // Je crée le setter pour l'attribut nom. Il prend en argument la valeur qu'aura l'attribut nom.
  public function setNom($arg)
  {
    $this->nom = $arg;
  }
  public function setPrenom($arg)
  {
    $this->prenom = $arg;
  }

  // Je crée le getter pour l'attribut nom. Il renvoire la valmeur de l'attibut nom.
  public function getNom()
  {
    return $this->nom;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }
}

$membre = new Membre('Marc', 'Fkaier');

var_dump($membre);
?>
