<link rel="stylesheet" href="<?php echo base_url();?>assets/css/histoire.css" type="text/css"/>
<script src="<?php echo base_url();?>assets/js/points_foissy.js"></script>
<div class="animation" id="animation" style="display: none;">
    <div class="center_vertical">
        <div class="diaporama row">
            <div class="col-2 flex">
                <div onclick="hide_animation()" id="quit_button"><h4> x </h4></div>
                <div id="left_button"><h3> < </h3></div>
            </div>
            <div class="image_description col-8">
                <img alt="" src="<?php echo base_url();?>assets/img/animation/moulin-de-foissy.jpg">
                <p>Le moulin de Foissy, érigé en 1983, est le batiment le plus
                ancien du village et le plus connus. Il a connu aucune guerre.</p>
            </div>
            <div class="col-2 flex">
                <div id="right_button"><h3> > </h3></div>
            </div>
        </div>
    </div>
</div>

<div class="container-lg main_body">
    <div class="groupe_vignette">
        <div class="vignette" onclick="smoothScroll(document.getElementById('ecole'))">
            <img onclick="smoothScroll(document.getElementById('histoire'))" src="<?php echo base_url();?>assets/img/berulle.jpg" alt="comte de bérulle">
            <p class="titre_vignette">L'histoire</p>
        </div>
        <div class="vignette" onclick="smoothScroll(document.getElementById('ecole'))">
            <img onclick="smoothScroll(document.getElementById('point'))" src="<?php echo base_url();?>assets/img/point.jpg" alt="point interessant">
            <p class="titre_vignette">Les points intéressants</p>
        </div>
    </div>
    <div class="histoire" id="histoire">
        <h1>L'histoire de Foissy-sur-vanne</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus
            eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae,
            molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra. Nulla
            bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat,
            ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum
        venenatis quam quis lobortis. Nulla ac nunc quam.</p>
        <div class="groupe_histoire">
            <div class="une_histoire row">
                <div class="col-md-3 img_container">
                    <img alt="comte de bérulle" src="<?php echo base_url();?>assets/img/berulle.jpg">
                </div>
                <div class="col-md-9 p_container_container">
                    <div class="p_container">
                        <p>En 1756 ..  lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus
                            eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae,
                        molestie risus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="point" id="point">
        <h1>Les points intéressants de Foissy-sur-vanne</h1>
        <div class="lance_animation">
            <button onclick="animation_points()">▷</button>
            <h3 id="button_description">Lancer animation</h3>
        </div>
    </div>
</div>
