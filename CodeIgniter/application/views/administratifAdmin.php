<link rel="stylesheet" href="<?php echo base_url();?>assets/css/administratif.css" type="text/css"/>
<script src="<?php echo base_url();?>assets/js/compte_rendus.js"></script>
<div class="container-lg main_body">
    <?php foreach($Data as $Comp): ?>

        <div class="page">
            <div class="page_titre" style="background-image: url(<?php echo base_url().$Comp->Image;?>)">
                <h3><?php echo $Comp->Titre; ?></h3>
                <button onclick="location.href='<?php echo $Comp->Redirection; ?>'">▶</button>
            </div>
            <div class="page_container">
                <p><?php echo $Comp->Description; ?></p>
            </div>

            <?php
            echo form_open('administratif/modifierTexte/'.$Comp->PrimaK,
                array('method'=>'get','style'=>'text-align:center'));
            echo form_submit('','Modifier le texte',"class='btn btn-warning'");
            echo form_close();?>

        </div>
    <?php endforeach; ?>
</div>