<div class="container main">
   <div class="page-header">
      <h1>Modifier un formulaire</h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open('dashboard/modifier/'.$Placement."/".$Titre."/".$Description."/".$Total,array()); ?>
            <div class="form-group">
               <label  for="Titre">Titre</label>
               <input value="<?php echo urldecode($Titre); ?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Description">Description</label>
               <textarea value="<?=set_value('Description')?>" id="Description" name="Description" required type="text" class="form-control"><?php echo urldecode($Description); ?></textarea>
            </div>

            <div class="form-group">
               <label  for="Position">Position dans la page</label>
               <select name="Position">
                  <?php for($debut = 1 ; $debut <= $Total ; $debut++ ): ?>
                  <option value='<?php echo $debut?>' <?php if($debut == $Placement){echo "selected";}?>> <?php echo $debut;  ?></option>
                  <?php endfor; ?>
               </select>
            </div>

            <input type="submit" value="Créer" class="btn btn-primary">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>
