<?php
// Panier.class.php

class PANIER
{
  public $nbrProduit; // une propriété

  public function ajouterArticle() // une méthode
  {
    return 'L\'article a été ajouté';
  }


  public function retirerArticle()
  {
    return 'L\'article a été retiré';
  }

  public function affichageArticle()
  {
    return 'Voici les articles';
  }
}

$panier1 = new Panier; // objet de la class panier j'instancie un objet $panier1 un objet est un espace independant memoire qui peut contenir des classes et des méthodes
$panier1->nbProduits = 5; // J'attribut 5 à la propriété nbProduits de l'objet panier1.
var_dump($panier1);

echo $panier1->affichageArticle() . '<br>'; // J'appelle la méthode affichageArticle() depuis l'objet $panier1.

$panier2 = new Panier;
$panier2->nbrProduits = 7;
var_dump($panier2);

?>
