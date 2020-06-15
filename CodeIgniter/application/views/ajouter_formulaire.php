<div class="container main">
   <div class="page-header">
      <h1>Ajouter un formulaire</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('dashboard/add/'.$Place,array()); ?>
            <div class="form-group">
               <label  for="Titre">Titre</label>
               <input value="<?=set_value('Titre')?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Description">Description</label>
               <textarea value="<?=set_value('Description')?>" id="Description" name="Description" required type="text" class="form-control"></textarea>
            </div>
            <div class="form_item" >
               <input type="file" name="userfile" size="20" />
            </div>
            <input type="submit" value="Créer" class="btn btn-primary">





            <?php echo form_close(); ?>      
         </div>
      </div>
   </div>
</div>
