<?php

if ($_POST) {
  if (strlen($_POST['pseudo']) == 0) {
    echo'<p style="background: #DC4444; font-weight: bold; color: white; padding: 5px; width: 10%">Vous devez saisir un pseudo</p>';
  }
  else {
    echo 'pseudo : ' . $_POST['pseudo'] . '<br>';
    echo 'email : ' . $_POST['email'] . '<br>';
  }
  $f = fopen('liste.txt', 'a');
  fwrite($f, $_POST['pseudo']  . "-");
  fwrite($f, $_POST['email']  . "\n");
  $f = fclose($f);
}

?>
