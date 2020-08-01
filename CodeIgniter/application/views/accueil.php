 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/index.css" type="text/css"/>
 <script src="<?php echo base_url();?>assets/js/activites.js"></script>
 <div class="container-lg main_body">
    <div class="row">
        <div class="col-lg-4 text_section">
            <?php foreach($Texte as $Comp1): ?>
                <?php if($Comp1->Placement == 1):?>
                    <h3><?php echo $Comp1->Titre;?></h3>
                    <p><?php echo $Comp1->Description;?></p>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-8">
            <div class="activities">
                <div class="bouton_suivant" id="previous_button" style="opacity: 0">
                    <p> < </p>
                </div>
                <div id="les_activites">
                    <?php 
                    $total = 0;
                    foreach($Activite as $C){
                        $total = $total+1;
                    }
                    ?>
                    <?php $i=0; foreach($Activite as $Comp2): $i=$i+1; ?>
                    <div class="activite_vignette" <?php if($i>4){ echo("style='display: none; opacity: 0'"); }; ?> >
                        <div class="ombre">
                            <img src="<?php echo base_url().$Comp2->Image;?>" alt="vignette activité"
                         onclick="location.href='<?= site_url("detailsA/redirection/".$Comp2->PrimaK)?>'" >
                            <p style="background-color: <?php echo $Comp2->Couleur; ?>" ><?php echo $Comp2->Titre;?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="bouton_suivant" id="next_button">
                <p> > </p>
            </div>
        </div>
    </div>
</div>
<div class="row citation">

    <?php foreach($Texte as $Comp1): ?>
        <?php if($Comp1->Placement == 2):?>
            <img class="guillemet col-2" src="<?php echo base_url();?>assets/img/guillement.png" alt="guillement de citation">
            <p class="col-8"><?php echo $Comp1->Titre;?></p>
            <img class="guillemet col-2 guillemet2" src="<?php echo base_url();?>assets/img/guillement2.png" alt="guillement de citation">
        <?php endif;?>
    <?php endforeach; ?>

</div>
<div class="row">
    <div class="col-lg-4 text_section">
        <?php foreach($Texte as $Comp1): ?>
            <?php if($Comp1->Placement == 3):?>
                <h3><?php echo $Comp1->Titre;?></h3>
                <p><?php echo $Comp1->Description;?></p>
            <?php endif;?>
        <?php endforeach; ?>

    </div>

    <div class="col-lg-8 le_personnel">
        <?php 
            $total = 0;
            foreach($Personnel as $Cc2){
                $total = $total+1;
            }
        ?>
        <?php foreach($Personnel as $Comp3): ?>
            <div class="personne">
                <img src="<?php echo base_url().$Comp3->Image;?>" alt="photo du membre">
                <p><?php echo $Comp3->Titre;?><br>
                    <?php echo $Comp3->Metier;?><br>
                    <?php echo $Comp3->Role;?></p>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
