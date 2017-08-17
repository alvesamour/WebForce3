// commentaire de ligne
/*
commentaire sur plusieurs lignes
*/

window.onload = function () {//on attent que le document soit entièrement chargé
    var myForm = document.getElementById("my-form");

    // on récupère les champs #number-1 et #number-2
    var number1 = document.getElementById("number-1");
    var number2 = document.getElementById("number-2");
    var resultField = document.getElementById("result-field");

    // on déclare la fonction calculate()
    function calculate(value1, value2) {

        // on additionne les 2 valeurs
        var result = value1 + value2;

        resultField.value = result;

        console.log(result);
    }

    // var calculate = function () {};

    // ajout d'un écouteur sur l'événement "submit" du formulaire
    /*myForm.onsubmit = function () {

    };*/

    // idem
    myForm.addEventListener("submit", function(e) {
        // alert('envoi du formulaire');

        /*on force le navigateur à rester sur la page à l'envoi
         return false;*/

        // bloque l'envoi du formulaire vers le serveur
        e.preventDefault();

        // on récupère la propriété value (le contenu) des champs
        var value1 = parseFloat(number1.value, 10);
        var value2 = parseFloat(number2.value, 10);

        if(!Number.isNaN(value1)
        && !Number.isNaN(value2))
        {
            calculate(value1, value2);
        } else {
            alert("erreur");
        }
    });
};
