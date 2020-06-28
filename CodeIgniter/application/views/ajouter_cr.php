<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ecole.css" type="text/css"/>
<div class="container main">
   <div class="page-header">
      <h1>Ajouter du personnel</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('accueil/ajouterPersonnel/',array()); ?>
            <div class="form-group">
               <label  for="Annee">Année :</label>
               <input value="<?=set_value('Annee')?>" id="Annee" name="Annee" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Date">Date : </label>
               <input value="<?=set_value('Date')?>" id="Date" name="Date" required type="text" class="form-control form-control-lg">
               <input type="date" id="Date" name="trip-Date"
       value="2018-07-22"
       min="1950-01-01" max="2018-12-31">
            </div>
            <div class="form-group">
               <label  for="Description">Description : </label>
               <input value="<?=set_value('Description')?>" id="Description" name="Description" required type="text" class="form-control form-control-lg">
            </div>

            <input type="submit" value="Ajouter" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>