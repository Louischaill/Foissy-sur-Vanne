<link rel="stylesheet" href="<?php echo base_url();?>assets/css/details_activites.css" type="text/css"/>

<div class="container-lg main_body">
    <div class="row">
        <?php $PageActi = '';?>
        <?php foreach($Infos as $Comp1): ?>
            <?php $PageActi = $Comp1->PrimaK;?>
            <div class="col-lg-6 image_activite">
                <img src="<?php echo base_url().$Comp1->Image?>" alt="image du personnel">
            </div>
            <div class="col-lg-6 text_section">
                <h3><?php echo $Comp1->Titre; ?></h3>
                <p><?php echo $Comp1->Description; ?></p>
            </div>

            <?php
            echo form_open('detailsA/modifierTexte/'.$Comp1->PrimaK,array('method'=>'get','style'=>'text-align:center'));
            echo form_submit('','Modifier',"class='btn btn-warning'");
            echo form_close();?>
        <?php endforeach; ?>
    </div>
    <br>

    <div id="diaporama_images" style="display: none">
        <?php $Photo1 = '';?>
        <?php $Des1 = '';?>
        <?php foreach($Diapo as $Comp2): ?>
            <?php if($Comp2->Placement == 1){$Photo1 = $Comp2->Image; $Des1 =$Comp2->Description; }?>
            <img src="<?php echo base_url().$Comp2->Image;?>">
            <p ><?php echo $Comp2->Description;?></p>

        <?php endforeach; ?>
    </div>
    <div class="diaporama" id="diaporama" style="background-image: url(<?php echo base_url().$Photo1;?>)">
        <div class="moitie">
            <div id="right_button" onclick="previous_image()"><h3> < </h3></div>
        </div>
        <div class="legende row">
            <div class="col-10">
                <p id="texte"><?php echo $Des1;?></p>
            </div>
            <div class="col-2 button_container">
                <div id="left_button" onclick="next_image()"><h3> > </h3></div>
            </div>
        </div>
    </div>
    <?php foreach($Diapo as $Comp3): ?>
        <p>Diapo n°<?php echo $Comp3->Placement; ?> :</p>
        <?php
        echo form_open('detailsA/modifierDiapo/'.$Comp3->PrimaK,array('method'=>'get','style'=>'text-align:center'));
        echo form_submit('','Modifier',"class='btn btn-warning'");
        echo form_close();?>
        <?php
        echo form_open('detailsA/deleteDiapo/'.$Comp3->PrimaK."/".$Comp3->Placement."/".$Comp3->Appartenance,array('method'=>'get','style'=>'text-align:center'));
        echo form_submit('','Supprimer',"class='btn btn-danger'");
        echo form_close();?>
     <?php endforeach; ?>
     <p>Ajouter une nouvelle diapo :</p>
     <?php
        echo form_open('detailsA/addDiapo/'.$PageActi,array('method'=>'get','style'=>'text-align:center'));
        echo form_submit('','Ajouter',"class='btn btn-success'");
        echo form_close();?>
</div>