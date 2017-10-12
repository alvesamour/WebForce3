<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <script type="text/javascript" src="ajax_insert.js"></script>
    </head>
    <body>

        <form method="post" action="#">
            <fieldset>
                <legend>Ajouter un employé</legend>

                <input type="text" name="personne" id="personne" placeholder="prénom à insérer">

                <input type="submit" id="submit" value="ok">

            </fieldset>
        </form>

        <div id="resultat"></div>
    </body>
</html>
