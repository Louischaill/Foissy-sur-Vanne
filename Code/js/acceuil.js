var showed = false;
var showNavigation = function () {
    var liste_navbar = document.getElementById("liste_navbar");
    if(showed){
        liste_navbar.style.display = "none";
        document.getElementById("reduit_navbar").style.display = "none";
        showed = false;
    }else if(!showed){
        liste_navbar.style.display = "flex";
        document.getElementById("reduit_navbar").style.display = "block";
        showed = true;
    }
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
    '<p>Comment faire une pièce d\'identité ?',
    '<p>pas d\'idée</p>'
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
        document.getElementById("changer_taille").style.display = "none";
        document.getElementById("parametres").style.display = "none";

        document.getElementById('bar_navigation').style.width = "100%";
        document.getElementById("hamburger").style.display = "block";
        document.getElementById("center_logo").style.margin = "auto 0";

        var liste_navbar = document.getElementById("liste_navbar");
        liste_navbar.style.display = "none";
        liste_navbar.style.flexDirection = "column";
        liste_navbar.style.backgroundColor = "white";
        liste_navbar.style.padding = "2em";
        liste_navbar.style.width = "100%";
        liste_navbar.style.alignItems = "center";
        liste_navbar.style.margin = "0";

        var childs = liste_navbar.childNodes;
        var j = 0;
        for(var i=0 ; i<childs.length ; i++){
            if(childs[i].nodeType!==3){
                if(j%2===1){
                    var p = document.createElement("p");
                    p.innerHTML = details_navbar[(j-1)/2];
                    liste_navbar.insertBefore(p, childs[i]);
                }
                j++;
            }
        }
        p = document.createElement("p");
        p.innerHTML = details_navbar[details_navbar.length-1];
        liste_navbar.insertBefore(p, childs[childs.length]);

        responsived = true;
    }else {
        if(responsived === false){
            return;
        }

        document.getElementById('bar_navigation').style.width = "60em";
        document.getElementById("changer_taille").style.display = "block";
        document.getElementById("parametres").style.display = "block";

        document.getElementById("center_logo").style.margin = "0 auto";
        liste_navbar = document.getElementById("liste_navbar");
        liste_navbar.style.display = "block";
        liste_navbar.style.flexDirection = "none";
        liste_navbar.style.backgroundColor = "transparent";
        liste_navbar.style.padding = "0";
        liste_navbar.style.width = "max-content";
        liste_navbar.style.alignItems = "none";
        liste_navbar.style.margin = "1em auto 0";

        var childs = liste_navbar.childNodes;
        for(var i=0 ; i<childs.length ; i++){
            console.log(childs[i]);
            if(childs[i].tagName === 'P'){
                liste_navbar.removeChild(childs[i]);
                i--;
            }
        }
        document.getElementById("hamburger").style.display = "none";
        document.getElementById("reduit_navbar").style.display = "none";
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