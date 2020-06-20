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
               <label  for="Titre">Prénom NOM :</label>
               <input value="<?=set_value('Titre')?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Metier">Métier</label>
               <input value="<?=set_value('Metier')?>" id="Metier" name="Metier" required type="text" class="form-control form-control-lg">
            </div>
            <div class="form-group">
               <label  for="Role">Rôle</label>
               <input value="<?=set_value('Role')?>" id="Role" name="Role" required type="text" class="form-control form-control-lg">
            </div>
            <div class="form_item" >
               <input type="file" name="userfile" size="20" />
            </div>

            <input type="submit" value="Ajouter" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>