<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ecole.css" type="text/css"/>
<div class="container-lg main_body">
   <div class="page-header">
      <h1>Modifier le message du Maire</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open('accueil/modifierMDM/'.$PrimaK,array()); ?>
            <div class="form-group">
               <label  for="Titre">Texte</label>
               <input value="<?php echo urldecode($Titre); ?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <input type="submit" value="Modifier" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>