r = new XMLHttpRequest();

r.open("POST", "ajax6.php", true); // on prépare le fichier PHP afin d'envoyer le prenom dont on souhaite afficher les informations
r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//La methode setRequestHeader() définit la valeur d'un en tête de requête HTTP.

r.send(); // on envoie les paramètres au fichier ajaxJs1.php

r.onreadystatechange = function() {
    if (r.readyState == 4 && r.status == 200) {
        var obj = JSON.parse(r.responseText);
        document.getElementById("resultat").innerHTML = obj.monresultat;
    }
}
