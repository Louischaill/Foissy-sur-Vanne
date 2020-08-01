 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/index.css" type="text/css"/>
 <div class="container-lg main_body">
    <div class="row">
        <div class="col-lg-4 text_section">
            <?php foreach($Texte as $Comp1): ?>
                <?php if($Comp1->Placement == 1):?>
                    <h3><?php echo $Comp1->Titre;?></h3>
                    <p><?php echo $Comp1->Description;?></p>
                    <?php
                    echo form_open('accueil/modifierTexte/'.$Comp1->PrimaK,array('method'=>'get','style'=>'text-align:center'));
                    echo form_submit('','Modifier',"class='btn btn-warning'");
                    echo form_close();?>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-8">
            <div class="activities">
                <div id="les_activites">
                    <?php 
                    $total = 0;
                    foreach($Activite as $C){
                      $total = $total+1;
                  }
                  ?>
                  <?php foreach($Activite as $Comp2): ?>
                    <div class="activite_vignette" >
                        <img src="<?php echo base_url().$Comp2->Image;?>" alt="vignette activité"
                         onclick="location.href='<?= site_url("detailsA/redirection/".$Comp2->PrimaK)?>'" >
                        <p style="background-color: <?php echo $Comp2->Couleur; ?>" ><?php echo $Comp2->Titre;?></p>
                        <?php
                        echo form_open('accueil/modifierActivite/'.$Comp2->PrimaK."/".$total,array('method'=>'get','style'=>'text-align:center'));
                        echo form_submit('','Modifier',"class='btn btn-warning'");
                        echo form_close();?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="bouton_suivant">
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
            <?php
            echo form_open('accueil/modifierMDM/'.$Comp1->PrimaK,array('method'=>'get','style'=>'text-align:center'));
            echo form_submit('','Modifier le message du Maire',"class='btn btn-warning'");
            echo form_close();?>
        <?php endif;?>
    <?php endforeach; ?>

</div>
<div class="row">
    <div class="col-lg-4 text_section">
        <?php foreach($Texte as $Comp1): ?>
            <?php if($Comp1->Placement == 3):?>
                <h3><?php echo $Comp1->Titre;?></h3>
                <p><?php echo $Comp1->Description;?></p>
                <?php
                echo form_open('accueil/modifierTexte/'.$Comp1->PrimaK,array('method'=>'get','style'=>'text-align:center'));
                echo form_submit('','Modifier',"class='btn btn-warning'");
                echo form_close();?>
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
            <div class="personne" style='border : solid'>
                <img src="<?php echo base_url().$Comp3->Image;?>" alt="photo du membre">
                <p><?php echo $Comp3->Titre;?><br>
                    <?php echo $Comp3->Metier;?><br>
                    <?php echo $Comp3->Role;?></p>
                                    
                    <?php
                    echo form_open('accueil/modifierPersonnel/'.$Comp3->PrimaK."/".$total,array('method'=>'get','style'=>'text-align:center'));
                    echo form_submit('','🖊️',"class='btn btn-warning'");
                    echo form_close();?>
                    <?php $placem = 0;
                    echo form_open('accueil/deletePersonnel/'.$Comp3->PrimaK."/".$Comp3->Placement,array('method'=>'get','style'=>'text-align:center'));
                    echo form_submit('','🗑️',"class='btn btn-danger'");
                    echo form_close();?>
                </div>
            <?php endforeach;?>
            <?php $placem = 0;
            echo form_open('accueil/ajouterPersonnel/',array('method'=>'get','style'=>'display: flex'));
            echo form_submit('','+',"class='btn btn-success horizontal_center'");
            echo form_close();?>
        </div>
    </div>
</div>
