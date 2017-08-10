// alert('bonjour');

// Exercice ;
/*window.onload = function () {
    var bonjour = "bonjour"
    var a = prompt("Entrez bonjour");
    if (a === bonjour) {
        alert("Bienvenue");
    } else {
        alert("Erreur");
    }
};*/

// correction :
window.onload = function () {
    // tout le JS ici

    // on récupère l'élément input-group
    var myField = document.getElementById("field");

    // on récupère le formulaire
    var myForm = document.getElementById("my-form");

    // on ajoute l'écouteur d'événement sur l'envoi du formulaire
    myForm.addEventListener("submit", function (e) {
        // on bloque le comportement par défaut de l'événement
        e.preventDefault();

        // on teste la valeur du champ myField
        if (myField.value == "bonjour") {
            // si la valeur est "bonjour"
            alert("Bienvenue");
        } else if (Number.parseFloat(myField.value) == myField.value) {
            // si la valeur est un nombre
            alert("chiffre");
        } else {
            // cas par défaut
            alert("erreur");
        }
    });
};
