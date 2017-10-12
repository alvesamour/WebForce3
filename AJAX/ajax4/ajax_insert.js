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

        r.open("POST", "ajax_insert.php", true); // je prépare le fichier php

        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // prépare la requête avant exécution

        r.send(parameters); // on donne le feu vert, la requête peut être envoyée et executée

        document.getElementById("resultat").innerHTML = "<span style='background: #22d3a7'>employé "+p.value+" ajouté</span>";
    }
});
