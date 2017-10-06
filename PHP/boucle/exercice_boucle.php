<?php
// boucle/exemple_boucle.php

// 1 : Télécharger 5 images sur google : image1.jpg, image2.jpg, image3.jpg, image4.jpg, image5.jpg

// 2 : Afficher l'image 1 grâce à une balise <img>.

// 3 : Afficher 5 fois l'image grâce à uen boucle while.

// 4 : Afficher les 5 images grâce à une boucle while.

// echo '<img src="img/image1.jpg" alt="">';
// echo '<img src="img/image2" alt="">';
// echo '<img src="img/image3" alt="">';
// echo '<img src="img/image4" alt="">';
// echo '<img src="img/image5.jpg" alt="">';

$i = 0;
while($i <= 5) {
    echo $i . '<img src="img/image1.jpg" alt="">';
    $i++;
}

$i = 0;
while($i <= 5) {
    echo $i . '<img src="img/image'. $i .'.jpg" alt="\">';
    $i++;
}






















?>
