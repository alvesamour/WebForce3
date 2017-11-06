<?php

class Employes
{
  public $prenom;
  public $nom;
  public $salaire;
  public $contrat;
  public $mission;
}

public function recevoirVirement() {
  
}

class Etudiant
{
  public $prenom;
  public $nom;
  public $cursus;
  public $planning;
  public $numeroEtudiant;
}

class Professeur extends Employes {}
class Technicien extends Employes {}
class Cadre extends Employes {}

class Erasmus extends Etudiant {}
class Boursier extends Etudiant {}
class Apprenti extends Etudiant {}

class Interne extends Etudiant
{
  public $employes; // Contient un objet de la classe Employes
  public $prenom;

  function __construct() {
    $this -> employes = new Employes();
    // Instance sans héritage : Je suis dans le classe Interne, qui aura accès à tourtes les propriétés de Etudiant (Héritage), mais également à toutes les propriétés de Employes via la propriété $employe qui contient un objet (une instance) de la classe Employes.
  }
}

$interne = new Interne();
$interne -> employes -> recevoirVirement();
// (objet de le classe meployes) -> recevoirVirement();
echo $interne -> prenom;











?>
