$(function() {
    var btn = $("#toggle-nav");

    btn.on("click", function(e) {
        e.preventDefault();

        $("#main-nav").toggleClass("opened");
    });

    // btn.off("click");// supprime l'écouteur d'événement click sur btn
});
