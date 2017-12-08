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


/* une classe est un regroupement de fonctions et de propriétés
 * quand on utilise la classe on créé un objet de cette classe
 */

 /*
 * CORRECTION
 */

 class Chat {
 	// je déclare mes variables
    /*  Niveaux de visibilité :
     * 		=> public : accessible de partout
     * 		=> protected : accessible depuis la classe ou l'élément a été créé et également
     * depuis les classes héritières
     *      => private : accessible UNIQUEMENT dans la classe où il a été créé/déclaré
     */
     private $prenom;
     private $age;
     private $couleur;
     private $sexe;
     private $race;

     //    'const' signifie que la propriété appartient à la classe et ne peut pas être modifiée.

     const SEXE_AVAILABLE = ['male', 'femelle'];

      /* __construct() est une fonction/méthode magique qui s'exécute lors de l'instanciation
     * Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque
     * création d'une nouvelle instance de l'objet, ce qui permet d'initialiser les paramètres de mon
     * nouvel objet
     */
     public function __construct($prenom, $age, $couleur, $sexe, $race)
     {
     	$this->setPrenom($prenom); // $this -> élément d'un objet à l'intérieur de la classe
        $this->setAge($age);
        $this->setCouleur($couleur);
        $this->setSexe($sexe);
        $this->setRace($race);
     }

   /*  Opérateurs :
	$objet -> élément d'un objet à l'extérieur de la classe
	$this -> élément d'un objet à l'intérieur de la classe
	Class:: élément d'yne classe à l'extérieur de la classe
	self:: élément d'une classe à l'intérieur de la classe

Pour savoir quel opérateur utiliser, 2 questions à se poser :
	=> est-ce static ?
		- si oui (self::, Class::)
			- est-ce que je l'utilise à l'intérieur de la classe
				- si oui ::self
				- si non ::Class
		- si non ($this ->, $objet ->)
			- est-ce que je l'utilise à l'intérieur de la classe
				- si oui $this ->
				- si non $objet ->

		'static' signifie qu'un élément appartient à la classe. Pour y accéder on devra donc l'appeler par la classe (self::, Class::). S'il s'agit d'une propriété elle peut être modifiée et tous les objets qui suivront auront la nouvelle valeur.
        */

      /*
     * On utilise les 'setters' pour affecter une valeur et ainsi en vérifier l'intégrité.
     * Nous aurons autant de getters et de setters que de variables/propriétés 'private' ou 'protected'.
     *      => Setter : Affecter une valeur
     *      => Getter : Voir/afficher
     */

     public function getPrenom(){
       	return $this->prenom;
       }
       private function setPrenom($prenom) {
       	if(is_string($prenom) && strlen($prenom) > 3 && strlen($prenom) < 20) {
          	$this->prenom = $prenom;
          } else {
          	trigger_error('Mauvais prénom', E_USER_WARNING);
          }
       }

       public function getAge() {
          return $this->age;
      }
      private function setAge($age) {
          if (is_int($age)) {
              $this->age = $age;
          } else {
              trigger_error('L\'age est invalide', E_USER_WARNING);
          }
      }

      public function getCouleur() {
          return $this->couleur;
      }
      private function setCouleur($couleur) {
          if (is_string($couleur) && strlen($couleur) > 3 && strlen($couleur) < 10) {
              $this->couleur = $couleur;
          } else {
              trigger_error('La couleur est invalide', E_USER_WARNING);
          }
      }

       public function getSexe() {
          return $this->sexe;
      }
      private function setSexe($sexe){
      	if(in_array($sexe, self::SEXE_AVAILABLE)){
          	$this->sexe = $sexe;
          } else {
          	trigger_error('Le sexe est invalide', E_USER_WARNING);
          }
      }

       public function getRace() {
          return $this->race;
      }
       private function setRace($race) {
          if (is_string($race) && (strlen($race) >= 3 && strlen($race) <= 20)) {
              $this->race = $race;
          } else {
              trigger_error('La race est invalide', E_USER_WARNING);
          }
      }

      /*
      * Je stocke les infos dans un tableau
      */
       public function getInfos(){
       	$infos = [
          	'prenom' => $this->getPrenom(),
              'age' => $this->getAge(),
              'couleur' => $this->getCouleur(),
              'sexe' => $this->getSexe(),
              'race' => $this->getRace()
          ];

          return $infos;
       }
   }
