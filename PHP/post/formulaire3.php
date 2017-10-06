<?php $msg =''; ?>
<h1>Formulaire 3</h1>
<form action="formulaire4.php" method="post">
    <?php echo $msg; ?>

    <label>Pseudo :</label><br>
    <input type="text" name="pseudo"><br><br>

    <label>Email :</label><br>
    <input type="email" name="email"><br><br>

    <input type="submit" value="Valider">

</form>
