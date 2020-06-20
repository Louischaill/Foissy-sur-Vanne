<div class="container main">
   <div class="page-header">
      <h1>Modifier le personnel</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('accueil/modifierPersonnel/'.$PrimaK."/".$Total,array()); ?>
            <div class="form-group">
               <label  for="Titre">Prénom Nom</label>
               <input value="<?php echo urldecode($Titre); ?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Metier">Métier</label>
               <input value="<?php echo urldecode($Metier); ?>" id="Metier" name="Metier" required type="text" class="form-control form-control-lg">
            </div>
            <div class="form-group">
               <label  for="Role">Rôle</label>
               <input value="<?php echo urldecode($Role); ?>" id="Role" name="Role" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Position">Position dans la page</label>
               <select name="Position">
                  <?php for($debut = 1 ; $debut <= $Total ; $debut++ ): ?>
                     <option value='<?php echo $debut;?>' <?php if($debut == $Placement){echo "selected";}?>> <?php echo $debut;  ?></option>
                  <?php endfor; ?>
               </select>
            </div>


            <div class="form_item" >
               <input type="file" name="userfile" size="20" />
            </div>

            <input type="submit" value="Modifier" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>