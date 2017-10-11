
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript" src=" ajaxJs2.js"></script>
    </head>
    <body>
        <form method="post" action="">
            <fieldset>
                <legend>Ajouter un employé</legend>

                <select name="personne" id="personne">
                    <?php
                    require_once ('init.inc.php');
                    $resultat = $pdo -> query("SELECT * FROM employes");
                        while($employes = $resultat->fetch(PDO::FETCH_ASSOC)){
                            echo '<option>'  . $employes['prenom'] . '</option>';
                        }
                    ?>
                </select>

                <input type="submit" id="submit" value="ok">

            </fieldset>
        </form>

        <div id="resultat"></div>
    </body>
</html>
