<?php

class Maison
{
  public static $espaceTerrain = '500m²';
  public $couleur = 'blanc';
  private static $nbPiece = 7;
  const HAUTEUR = '10m';

  public static function getNbPiece()
  {
    return self::$nbPiece;
  }
}

echo 'espace terrain : ' . Maison::$espaceTerrain . '<br>';
$mon_objet = new Maison;
echo 'couleur : ' . $mon_objet->couleur . '<br>';
echo 'Nombre de pièces : ' . Maison::getNbPiece() . '<br>';
echo 'Hauteur : ' . Maison::HAUTEUR;

?>
