<nav class="navigation2" id="bar_navigation">
    <div id="changer_taille">
        <img class="petit_plus" alt="petit-plus" src="<?php echo base_url();?>assets/img/zoom.png">
        <img class="moyen_plus" alt="moyen-plus" src="<?php echo base_url();?>assets/img/zoom.png">
        <img class="grand_plus" alt="grand_plus" src="<?php echo base_url();?>assets/img/zoom.png">
    </div>
    <div id="parametres">
        <img alt="roue-crantée" src="<?php echo base_url();?>assets/img/parametre2.png">
    </div>
    <div id="container_logo_ham">
        <div id="center_logo">
            <img id="logo_yonne" src="https://upload.wikimedia.org/wikipedia/fr/c/c1/Yonne_%2889%29_logo_2015.svg"
                 alt="logo de l'yonne">
        </div>
        <div id="hamburger" onclick="showNavigation()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <ul id="liste_navbar">
        <li onclick="location.href='<?= site_url("accueil")?>'" onmouseover="bouton_navbar_hover(0)" onmouseleave="bouton_navbar_hover_end()" ><a href="<?php site_url("accueil")?>"></a>
            <p>Accueil</p>
        </li>
        <li onclick="location.href='<?= site_url("ecole")?>'" onmouseover="bouton_navbar_hover(1)" onmouseleave="bouton_navbar_hover_end()" >
            <p>Ecole</p>
        </li>
        <li onclick="location.href='#'" onmouseover="bouton_navbar_hover(2)" onmouseleave="bouton_navbar_hover_end()" >
            <p>S'installer</p>
        </li>
        <li onclick="location.href='<?= site_url("plui")?>'" onmouseover="bouton_navbar_hover(3)" onmouseleave="bouton_navbar_hover_end()" >
            <p>Administratif</p>
        </li>
        <li onclick="location.href='#'" onmouseover="bouton_navbar_hover(4)" onmouseleave="bouton_navbar_hover_end()" >
            <p>Histoire et Lieux</p>
        </li>
    </ul>
    <div onclick="showNavigation()" id="reduit_navbar">▲</div>
</nav>
<div id="details" onmouseover="details_entered()" onmouseleave="details_leaved()">
    <p>Où sont situés les écoles les plus proches ? Quels est le système en place dans
        ma commune ?<br>
        <strong>Ecole :</strong> enseignement, etc...<br>
        <strong>Garderie :</strong> horaires d'ouvertures/fermetures etc..<br>
        <strong>Bus :</strong> horaires, circuit etc...<br>
        <strong>Cantine :</strong> frais, horaires, système</p>
</div>

<img src="<?php echo base_url();?>assets/img/vue-aerienne.jpg" alt="image_centrale" id="image_centrale">