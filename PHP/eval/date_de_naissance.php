<label>Date de naissance :</label><br/>

<select>
    <?php
    for($i = 1; $i <= 31; $i++){
        echo '<option>' . substr('0'.$i, -2) . '</option>';
    }
    ?>
</select>


<select>
    <option>Janvier</option>
    <option>Février</option>
    <option>Mars</option>
    <option>Avril</option>
    <option>Mai</option>
    <option>Juin</option>
    <option>Juillet</option>
    <option>Août</option>
    <option>Septembre</option>
    <option>Octobre</option>
    <option>Novembre</option>
    <option>Décembre</option>
</select>

<select name="annee">
    <?php
        $i = date('Y') - 0;
        while($i >= 1900 ){
            echo '<option>' . $i . '</option>';
            $i --;
        }
    ?>
</select><br/><br/>

<input type="submit" value="Envoi" />
