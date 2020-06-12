var responsived = false;
window.onload = function () {
    if (window.innerWidth < 960) {
        window.onresize();
    }
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
