<?php

/*
 * SUJET
 *
 *  Vous travaillez pour la SPA. Dans le cadre de la refonte du site, vous devez créer une class Chat() qui aura les propriétés privées suivantes :
 * - Prénom (string de 3 à 20 caractères)
 * - Age (int)
 * - Couleur (string de 3 à 10 caractères)
 * - Sexe (string : male ou femelle)
 * - Race (string de 3 à 20 caractères)
 *
 * Faire les getters/setters permettant de valider le type de données ci-dessus ainsi que le constructeur permettant d’instancier la classe.
 * => Setter : Affecter une valeur
 * => Getter : Voir/afficher
 *
 * Ajouter une méthode getInfos() permettant de retourner la totalité des propriétés sous forme de tableau.

 * Dans un nouveau fichier, instancier la classe afin de pouvoir afficher 3 chats différents et afficher le résultat à l’aide de la méthode getInfos() précédemment créée.
*/

class Chat
{
  public $prenom;
  public $age;
  public $couleur;
  public $sexe;
  public $race;

  public function __construct($arg)
  {
    $this->setPrenom($arg);
    $this->setAge($arg);
    $this->setCouleur($arg);
    $this->setSexe($arg);
    $this->setRace($arg);
  }

  public function setPrenom($arg)
  {
    $this->prenom = $arg;
  }
  public function getPrenom()
  {
    return $this->prenom;

  }

  public function setAge($arg)
  {
    $this->age = $arg;
  }
  public function getAge()
  {
    return $this->age;
  }

  public function setCouleur($arg)
  {
    $this->couleur = $arg;
  }
  public function getCouleur()
  {
    return $this->couleur;
  }

  public const function setSexe($arg)
  {
    $this->sexe = $arg;
  }
  public const function getSexe()
  {
    return $this->sexe;
  }

  public function setRace($arg)
  {
    $this->race = $arg;
  }
  public function getRace()
  {
    return $this->race;
  }
}

/*
 * CORRECTION
 */
