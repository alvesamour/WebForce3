document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault(); // annule le comportement par défaut du submit qui est censé recharger la page
        ajax();
    });
    function ajax() {
        r = new XMLHttpRequest();
        var p = document.getElementById("personne");
        var personne = p.value; // permet de récuperer la valeur de l'input
        // console.info(personne);

        var parameters = "personne="+personne; // prépare les paramètres à envoyer à la requête SQL
        // console.info(parameters);

        r.open("POST", "ajax5.php", true); // je prépare le fichier php

        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // prépare la requête avant exécution

        r.send(parameters); // on donne le feu vert, la requête peut être envoyée et executée

        r.onreadystatechange = function() {
            if (r.readyState == 4 && r.status == 200) {
                var obj = JSON.parse(r.responseText);
                console.info(obj);
                document.getElementById("resultat").innerHTML = obj.monresultat;
            }
        }
    }
});
