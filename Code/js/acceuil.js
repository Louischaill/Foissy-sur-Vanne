var showNavigation = function () {

};
var details_navbar = [
    '<p>Quels activités sont proposées par Foissy ? Qui sont les personnes derrières' +
    'le conseil général ?<br>',
    '<p>Où sont situés les écoles les plus proches ? Quels est le système en place dans' +
    'ma commune ?<br>' +
    '<strong>Ecole :</strong> enseignement, etc...<br>' +
    '<strong>Garderie :</strong> horaires d\'ouvertures/fermetures etc..<br>' +
    '<strong>Bus :</strong> horaires, circuit etc...<br>' +
    '<strong>Cantine :</strong> frais, horaires, système</p>',
    '<p>Comment s\'intaller à Foissy-sur-vanne, quels sont les offres immobilières disponibles ?',
    '<p>Comment faire une pièce d\'identité ?'
];

var responsived = false;
window.onload = function () {
    if (window.innerWidth < 960) {
        window.onresize();
    }
    var hamburger = document.getElementById("hamburger").addEventListener("click", showNavigation)
};
window.onresize = function () {
    if (window.innerWidth < 960) {
        if (responsived === true){
            return;
        }

        var bar_navigation = document.getElementById('bar_navigation');
        bar_navigation.style.width = "100%";
        bar_navigation.style.display = "flex";
        bar_navigation.style.justifyContent = "space-between";
        document.getElementById("changer_taille").style.display = "none";
        document.getElementById("parametres").style.display = "none";

        var center_logo = document.getElementById("center_logo");
        center_logo.style.margin = "auto 0";
        document.getElementById("liste_navbar").style.display = "none";
        var hamburger = document.getElementById("hamburger").style.display = "block";

        responsived = true;
    }else {
        if(responsived === false){
            return;
        }

        var bar_navigation = document.getElementById('bar_navigation');
        bar_navigation.style.width = "60em";
        bar_navigation.style.display = "block";
        bar_navigation.style.justifyContent = "none";
        document.getElementById("changer_taille").style.display = "block";
        document.getElementById("parametres").style.display = "block";

        var center_logo = document.getElementById("center_logo");
        center_logo.style.margin = "0 auto";
        document.getElementById("liste_navbar").style.display = "block";
        var hamburger = document.getElementById("hamburger").style.display = "none";

        responsived = false;
    }
};
var bouton_navbar_hover = function (number) {
    var details = document.getElementById("details");
    details.innerHTML = details_navbar[number];
    details.style.opacity = "100%";
};
var bouton_navbar_hover_end = function () {
    document.getElementById("details").style.opacity = "0";
};