/*-- Js gerant la barre de navigation, son responsive mais aussi ses boutons --*/

/*-- Les boutons navbar font apparaitre un résumé des pages vers lesquels ils mènent
les fonctions suivantes gèrent cet aspect --*/
var timeOut = true;
var bouton_navbar_hover = function (number) {
    var details = document.getElementById("details");
    details.innerHTML = "";
    var p = document.createElement("p");
    p.innerHTML = details_navbar[number];
    details.appendChild(p);
    details.style.opacity = "100%";
    clearTimeout(timing_function);
    timeOut = true;
};
var bouton_navbar_hover_end = function () {
    var details = document.getElementById("details");
    details.style.opacity = "0";
};
var details_entered = function () {
    if(timeOut) {
        clearTimeout(timing_function);
        document.getElementById("details").style.opacity = "100%";
    }
};
var timing_function;
var details_leaved = function (){
    document.getElementById("details").style.opacity = "0";
    timing_function = setTimeout(function () {
        timeOut = false;
    }, 3000);
};

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
/*-- Les résumé du contenu des pages, peut être changé --*/
var details_navbar = [
    'Quels activités sont proposées par Foissy ? Qui sont les personnes derrières' +
    'le conseil général ?<br>',
    'Où sont situés les écoles les plus proches ? Quels est le système en place dans' +
    'ma commune ?<br>' +
    '<strong>Ecole :</strong> enseignement, etc...<br>' +
    '<strong>Garderie :</strong> horaires d\'ouvertures/fermetures etc..<br>' +
    '<strong>Bus :</strong> horaires, circuit etc...<br>' +
    '<strong>Cantine :</strong> frais, horaires, système',
    'Comment s\'intaller à Foissy-sur-vanne, quels sont les offres immobilières disponibles ?',
    'Comment faire une pièce d\'identité ?',
    'pas d\'idée'
];


window.onload = function () {
    if (window.innerWidth < 960) {
        window.onresize();
    }

    /*
    //tester l'efficacité d'une fonction
    var iterations = 20000;
    console.time('Fonction #2');
    for(i=0 ; i<iterations ; i++){

    }
    console.timeEnd('Fonction #2');
    console.time('Fonction #1');
    for(var i=0 ; i<iterations ; i++){
    }
    console.timeEnd('Fonction #1');
    */
};

//2000ms pour 20000 itérations
/*-- Fonction visant à rendre la navbar responsive --*/
var responsived = false;
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
        liste_navbar.style.border = "solid #C4C4C4"

        var childs = liste_navbar.childNodes;
        var j = 0;
        for(var i=0 ; i<childs.length ; i++){
            if(childs[i].nodeType!==3){
                if(childs[i].tagName === 'LI'){
                    childs[i].style.borderRadius = "0";
                    childs[i].style.width = "80%";
                }
                if(j%2===1){
                    var p = document.createElement("p");
                    p.innerHTML = details_navbar[(j-1)/2];
                    p.style.width = "80%";
                    p.style.textAlign = "left";
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
        console.log(liste_navbar.style);
        liste_navbar.style.display = "block";
        liste_navbar.style.flexDirection = "none";
        liste_navbar.style.backgroundColor = "transparent";
        liste_navbar.style.padding = "0";
        liste_navbar.style.width = "max-content";
        liste_navbar.style.alignItems = "none";
        liste_navbar.style.margin = "1em auto 0";
        liste_navbar.style.border = "none";

        var childs = liste_navbar.childNodes;
        for(var i=0 ; i<childs.length ; i++){
            console.log(childs[i]);
            if(childs[i].tagName === 'LI'){
                childs[i].style.width = "11em";
                childs[i].style.borderRadius = "2em";
            }
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

/*7000ms pour 20000 itérations*/
/*-- fonction alternative pour gerer le responsive de la navba --*/
/*
window.onresize = function () {
    if (window.innerWidth < 960) {
        if (responsived === true){
            return;
        }
        var bar_navigation = document.getElementById("bar_navigation");
        bar_navigation.innerHTML = "<div id='changer_taille' style='display: none;'>" +
            "    </div>" +
            "    <div id='parametres' style='display: none;'>" +
            "        <img src='image/'>" +
            "    </div>" +
            "    <div id='container_logo_ham'>" +
            "        <div id='center_logo' style='margin: auto 0;'>" +
            "            <img id='logo_yonne' src='https://upload.wikimedia.org/wikipedia/fr/c/c1/Yonne_%2889%29_logo_2015.svg' alt='logo de l'yonne'>" +
            "        </div>" +
            "        <div id='hamburger' style='display: block;' onclick='showNavigation()'>" +
            "            <div></div>" +
            "            <div></div>" +
            "            <div></div>" +
            "        </div>" +
            "    </div>" +
            "    <ul id='liste_navbar' style='border: solid #C4C4C4; display: none; flex-direction: column; background-color: white; padding: 2em; width: 100%; align-items: center; margin: 0px;'>" +
            "        <li style='border-radius: 0; width: 80%' onclick='location.href='#'' onmouseover='bouton_navbar_hover(0)' onmouseleave='bouton_navbar_hover_end()' id='activated'>" +
            "            <p>Acceuil</p>" +
            "        </li>" +
            "        <p style='width: 80%; text-align: left'>Quels activités sont proposées par Foissy ? Qui sont les personnes derrièresle conseil général ?<br></p>" +
            "        <li style='border-radius: 0; width: 80%' onclick='location.href='#'' onmouseover='bouton_navbar_hover(1)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Ecole</p>" +
            "        </li>" +
            "        <p style='width: 80%; text-align: left'>Où sont situés les écoles les plus proches ? Quels est le système en place dansma commune ?<br><strong>Ecole :</strong> enseignement, etc...<br><strong>Garderie :</strong> horaires d'ouvertures/fermetures etc..<br><strong>Bus :</strong> horaires, circuit etc...<br><strong>Cantine :</strong> frais, horaires, système</p>" +
            "        <li style='border-radius: 0; width: 80%' onclick='location.href='#'' onmouseover='bouton_navbar_hover(2)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>S'installer</p>" +
            "        </li>" +
            "        <p style='width: 80%; text-align: left'>Comment s'intaller à Foissy-sur-vanne, quels sont les offres immobilières disponibles ?</p>" +
            "        <li style='border-radius: 0; width: 80%' onclick='location.href='#'' onmouseover='bouton_navbar_hover(3)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Administratives</p>" +
            "        </li>" +
            "        <p style='width: 80%; text-align: left'>Comment faire une pièce d'identité ?</p>" +
            "        <li style='border-radius: 0; width: 80%' onclick='location.href='#'' onmouseover='bouton_navbar_hover(4)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Histoire et Lieux</p>" +
            "        </li>" +
            "        <p style='width: 80%; text-align: left'>pas d'idée</p>" +
            "    </ul>" +
            "    <div onclick='showNavigation()' id='reduit_navbar'>▲</div>";
        bar_navigation.style.width = "100%";
        document.getElementById("details").style.display = "none";

        responsived = true;
    }else {
        if(responsived === false){
            return;
        }
        var bar_navigation = document.getElementById("bar_navigation");
        bar_navigation.innerHTML = "" +
            "    <div id='changer_taille'>" +
            "        <img class='petit_plus' alt='petit-plus' src='image/zoom.png'>"+
            "        <img class='moyen_plus' alt='moyen-plus' src='image/zoom.png'>"+
            "        <img class='grand_plus' alt='grand_plus' src='image/zoom.png'>"+
            "    </div>" +
            "    <div id='parametres'>" +
            "        <img alt='roue-crantée' src='image/parametre2.png'>" +
            "    </div>" +
            "    <div id='container_logo_ham'>" +
            "        <div id='center_logo'>" +
            "            <img id='logo_yonne' src='https://upload.wikimedia.org/wikipedia/fr/c/c1/Yonne_%2889%29_logo_2015.svg' alt='logo de l'yonne'>" +
            "        </div>" +
            "        <div id='hamburger' onclick='showNavigation()'>" +
            "            <div></div>" +
            "            <div></div>" +
            "            <div></div>" +
            "        </div>" +
            "    </div>" +
            "    <ul id='liste_navbar'>" +
            "        <li onclick='location.href='#'' onmouseover='bouton_navbar_hover(0)' onmouseleave='bouton_navbar_hover_end()' id='activated'>" +
            "            <p>Acceuil</p>" +
            "        </li>" +
            "        <li onclick='location.href='#'' onmouseover='bouton_navbar_hover(1)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Ecole</p>" +
            "        </li>" +
            "        <li onclick='location.href='#'' onmouseover='bouton_navbar_hover(2)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>S'installer</p>" +
            "        </li>" +
            "        <li onclick='location.href='#'' onmouseover='bouton_navbar_hover(3)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Administratives</p>" +
            "        </li>" +
            "        <li onclick='location.href='#'' onmouseover='bouton_navbar_hover(4)' onmouseleave='bouton_navbar_hover_end()'>" +
            "            <p>Histoire et Lieux</p>" +
            "        </li>" +
            "    </ul>" +
            "    <div onclick='showNavigation()' id='reduit_navbar'>▲</div>";
        bar_navigation.style.width = "60em";
        document.getElementById("details").style.display = "block";

        responsived = false;
    }
};
 */
