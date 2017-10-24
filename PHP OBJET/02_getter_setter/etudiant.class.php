<?php
class ETUDIANT
{
  private $prenom;
  public function __construct($arg)
  {
    echo 'Instanciation, nous avons reçu l\'argument suivant : ' . $arg;
    $this->setPrenom($arg);
  }

  public function setPrenom($arg) // set : donne une valeur à l'attribut prenom
  {
    $this->prenom = $arg;
  }
  public function getPrenom() // get : récupère la valeur
  {
    return $this->prenom;
  }
}

$etudiant = new Etudiant('Marc'); echo "<br>";

var_dump($etudiant);
$etudiant->setPrenom('Nicolas'); echo "<br>";
var_dump($etudiant);

?>
