// Fonction permettent d'exécuter la fonction ajax() toutes les 10 secondes pour afficher les employés de manière actualisé.
setInterval("ajax()", 10000);

ajax(); // exécution de la méthode ajax() immédiatement pour ne pas attendre 10 secondes lors du 1er affichage de la page

function ajax() {
  r = new XMLHttpRequest();
  // console.log(r);

  // document.write('test' + '<br>');

  r.open("POST", "ajax8.php", true); // je prépare le fichier php auquel on enverra des données

  r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // prépare la requête avant exécution

  r.send(); // on donne le feu vert, la requête peut être envoyée et executée

  r.onreadystatechange = function() {
    if (r.readyState == 4 && r.status == 200) {
        var obj = JSON.parse(r.responseText);
        document.getElementById("resultat").innerHTML = obj.resultat;
    }
  }
}
