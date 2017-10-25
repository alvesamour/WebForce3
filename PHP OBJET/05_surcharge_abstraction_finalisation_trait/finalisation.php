<?php

final class Application
{
  public function launchApp()
  {
    return "L'app s'est lancée.";
  }
}

// provoque uen erreur
// class Extention extends Application{}
$app = new Application; // la class est instanciable
echo $app->launchApp();

class Extension2 extends App
{
  // provoque une erreur
  public function launchApp() {
    // bla bla bla
  }
}
?>
