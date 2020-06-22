<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ecole.css" type="text/css"/>
<div class="container-lg main_body">
    <h1>Démarches Administratives</h1>
    <div class="carree_vignette">
        <?php foreach($Composants as $Comp): ?>
            <?php if($Comp->Placement % 2 !== 0):?>
                <div class="<?php echo $Comp->CSS; ?>">
                    <div class="vignette" onclick="smoothScroll(document.getElementById('<?php echo $Comp->Ancre; ?>'))">
                        <img src="<?php echo base_url().$Comp->Image;?>" alt="<?php echo $Comp->Titre; ?>">
                        <p class="titre_vignette"><?php echo $Comp->Titre; ?></p>
                    </div>
                <?php endif; ?>
                <?php if($Comp->Placement % 2 === 0):?>
                    <div class="vignette" onclick="smoothScroll(document.getElementById('declaration_travaux'))">
                        <img src="<?php echo base_url().$Comp->Image;?>" alt="<?php echo $Comp->Titre; ?>">
                        <p class="titre_vignette"><?php echo $Comp->Titre; ?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <?php foreach($Composants as $Comp1): ?>
        <div class="container-lg text_section ecole_section" id="<?php echo $Comp1->Ancre;?>">
            <h3><?php echo $Comp1->Titre;?></h3>
            <p><?php echo $Comp1->Description;?></p>
            <?php
            echo form_open('demarches_administratives/modifierTexte/'.$Comp1->PrimaK,array('method'=>'get','style'=>'text-align:center'));
            echo form_submit('','Modifier',"class='btn btn-warning'");
            echo form_close();?>
        </div>

    <?php endforeach; ?>

</div>