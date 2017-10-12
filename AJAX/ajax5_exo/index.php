<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript" src=" ajax5.js"></script>
    </head>
    <body>
        <form method="post" action="">
            <fieldset>
                <legend>Supprimé un employé</legend>
                <div id="resultat">
                <select name="personne" id="personne">
                    <?php
                    require_once ('init.inc.php');
                    $resultat = $pdo -> query("SELECT * FROM employes");
                        while($employes = $resultat->fetch(PDO::FETCH_ASSOC)){
                            echo '<option>'  . $employes['prenom'] . '</option>';
                        }
                    ?>
                </select><br><br>
                </div>
                <input type="submit" id="submit" value="supprimer">
            </fieldset>
        </form>
    </body>
</html>
