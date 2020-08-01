<link rel="stylesheet" href="<?php echo base_url();?>assets/css/details_activites.css" type="text/css"/>
<script src="<?php echo base_url();?>assets/js/diaporama.js"></script>

<div class="container-lg main_body">
    <div class="row">
        <?php foreach($Infos as $Comp1): ?>
            <div class="col-lg-6 image_activite">
                <img src="<?php echo base_url().$Comp1->Image?>" alt="image du personnel">
            </div>
            <div class="col-lg-6 text_section">
                <h3><?php echo $Comp1->Titre; ?></h3>
                <p><?php echo $Comp1->Description; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <div id="diaporama_images" style="display: none">
        <?php $Photo1 = ''?>
        <?php foreach($Diapo as $Comp2): ?>
            <?php if($Comp2->Placement == 1){$Photo1 = $Comp2->Image; $Des1 =$Comp2->Description; }?>
            <img src="<?php echo base_url().$Comp2->Image;?>">
            <p><?php echo base_url().$Comp2->Description;?></p>
        <?php endforeach; ?>
    </div>
    <div class="diaporama" id="diaporama" style="background-image: url(<?php echo base_url().$Photo1;?>)">
        <div class="moitie">
            <div id="right_button" onclick="previous_image()"><h3> < </h3></div>
        </div>
        <div class="legende row">
            <div class="col-10">
                <p id="texte"><?php echo $Des1?></p>
            </div>
            <div class="col-2 button_container">
                <div id="left_button" onclick="next_image()"><h3> > </h3></div>
            </div>
        </div>
    </div>
   <!-- <div class="indicateur">
        <div class="petit_rond"></div>
        <div class="petit_rond"></div>
        <div class="petit_rond"></div>
    </div>-->
</div>

