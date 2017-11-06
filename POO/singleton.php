<?php

// design pattern : Modèle de conception : Le design pattern est la réponse trouvée par des développeurs pour répondre à une problématique rencontrée par la communauté.

// Singleton : Est un design pattern qui répond à la question suivante : Comment créer un classe qui soit instanciable UNE SEULE FOIS !? Une classe pour laquelle il ne puisse existait qu'un SEUL OBJET.

class Singleton
{
  private static $instance = NULL; // NULL >> Objet de la classe SINGLETON

  private function __construct(){} // En mettant le constructeur en private il devient impossible d'instancié cette classe comme on le fait habituellement.

  private function __clone(){} // En mettant la fonction clone en private il devient impossible de cloner un objet de cette classe.

  public static function getInstance() {
    if (is_null(self::$instance)) {
      self::$instance = new Singleton;
      // self::$instance = new self;
    }
    return self::$instance;
  }

}

$singleton = SINGLETON::getInstance(); // $singleton contient le seul et unique objet de la classe Singleton.
// $a = new Singleton; // IMPOSSIBLE !! INSTANCIATION IMPOSSIBLE !!
