<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Execice 1</title>
    </head>
    <body>

        <?php

        $presentation  = array (
            'prenom'=>'sara',
            'nom'=>'fkaier',
            'adresse'=>'12 rue des marguerite',
            'code postal'=> 83700,
            'ville'=> 'St raphael',
            'email'=> 'sara.fkaier@gmail.com',
            'telephone'=> '0600000000',
            'date de naissance'=> '(1994-08-18)');

            // boucle foreach :

            echo "<ul>";
            foreach($presentation as $indice => $valeur)
            {
                echo '<li>'.$indice.' : '.$valeur.'</li><br/>';
            }

            echo "</ul>";

            // Tableau en PHP :

            echo "<pre>";
            print_r($presentation);
            echo "<pre>";


            ?>

    </body>

</html>
