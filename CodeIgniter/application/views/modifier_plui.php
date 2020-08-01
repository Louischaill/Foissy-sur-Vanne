<link rel="stylesheet" href="<?php echo base_url();?>assets/css/PLUI.css" type="text/css"/>
<div class="container-lg main_body">
   <div class="page-header">
      <h1>Modifier <?php echo $Titre; ?></h1>
   </div>

   <div class="well">
      <div grid>
         <div column="+3 6">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('plui/modifierPlui/'.$PrimaK,array()); ?>
            <div class="form-group">
               <label  for="TitreDom">Titre 1 :</label>
               <input value="<?php echo $TitreDom; ?>" id="TitreDom" name="TitreDom" required type="text" class="form-control form-control-lg">
            </div>
            <div class="form-group">
               <label  for="Titre">Titre 2 :</label>
               <input value="<?php echo $Titre; ?>" id="Titre" name="Titre" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form-group">
               <label  for="Description">Description :</label>
               <textarea value="<?=set_value('Description')?>" id="Description" rows="10" name="Description" required type="text" class="form-control"><?php echo $Description; ?></textarea>
            </div>
            <div class="form-group">
               <label  for="Lien">Lien : </label>
               <input value="<?php echo $Lien; ?>" id="Lien" name="Lien" required type="text" class="form-control form-control-lg">
            </div>

            <div class="form_item" >
               <label  for="userfile">Changer le pdf : </label>
               <input type="file" name="userfile" size="20" />
            </div>
            <br>
            <input type="submit" value="Modifier" class="btn btn-success">
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>