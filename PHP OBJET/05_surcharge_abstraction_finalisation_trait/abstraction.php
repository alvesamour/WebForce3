<?php

// abstract signifie que je vais triuver des méthodes abstratites dans la class
abstract class Joueur
{
  // méthode normale
  public function seConnecter()
  {
    return $this->etreMajeur();
  }

  // une méthode abstraite.
  // "abstract" signifie que lorsqu'on étrend la class Joueur, on sera obligé de redéfinir ces méthodes. En l'occurence etreMjeur() et devise().
  abstract public function
  etreMajeur();
  abstract public function devise();
}

class JoueurFR extends Joueur
{
  public function etreMajeur()
  {
    return 18;
  }

  public function devise()
  {
    return '€';
  }
}

class JoueurUS extends Joueur
{
  public function etreMajeur()
  {
    return 21;
  }
  public function devise()
  {
    return '$';
  }
}

?>
