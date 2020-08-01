<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ecole.css" type="text/css"/>
<div class="container-lg main_body">
   <div class="page-header">
      <h1>Modifier un formulaire</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open('accueil/modifierTexte/'.$PrimaK,array()); ?>
            <div class="form-group">
               <label  for="Titre">Titre</label>
               <input value="<?php echo urldecode($Titre); ?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Description">Description</label>
               <textarea value="<?=set_value('Description')?>" id="Description" rows="10" name="Description" required type="text" class="form-control"><?php echo urldecode($Description); ?></textarea>
            </div>

            <input type="submit" value="Modifier" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>