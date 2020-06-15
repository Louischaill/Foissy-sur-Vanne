
<div class="dashboard">
  <div class="container main">
   <div class="page-header">
    <h1>Accueil</h1>
    <h4>Bonjour <b><?php echo $this->session->userdata('username'); ?></b></h4>

  </div>
  <?php $error = $this->session->flashdata("error"); ?>

  
  <div class="well">
    <?php $placem = 0;
    echo form_open('dashboard/add/'.$placem,array('method'=>'get','style'=>'text-align:right'));
    echo form_submit('','Ajouter',"class='btn btn-success'");
    echo form_close();?>
    <?php 
    $total = 0;
    foreach($Composants as $Comp){
      $total = $total+1;
    }
    ?>
    <?php foreach($Composants as $Comp): ?>
      <div class="well" id="<?php html_escape($Comp->PrimaK) ?>" >
       <h2><?php echo $Comp->Titre;?></h2>
       <div class="well">
        <p class="texte"><?php echo $Comp->Description; ?></p>
        <?php if($Comp->Image != NULL):?>
          <img src="<?php echo $Comp->Image; ?>" height="100" width=150>
        <?php endif;?>
      </div>

      <?php 

      $this->table->set_heading(array(''));

      $template = array(
        'table_open' => '<table class="table table-striped">'
      );

      $this->table->set_template($template);

      $this->table->add_row(
        array(
          'data'=>anchor('dashboard/delete/'.$Comp->Placement."/".$Comp->PrimaK,
            '<i class="fas fa-times"> Supprimer</i>',
            array('class'=>'btn btn-danger'))." ".
          anchor('dashboard/modifier/'.$Comp->Placement."/".$Comp->Titre."/".$Comp->Description."/".$total ,
            '<i class="far fa-eye"> Modifier</i>',
            array('class'=>'btn btn-warning')),

          'style'=>"text-align:center")
      );

      echo $this->table->generate();
      echo form_open('dashboard/add/'.$Comp->Placement,array('method'=>'get','style'=>'text-align:right'));
      echo form_submit('','Ajouter',"class='btn btn-success'");
      echo form_close();
      ?>
    </div>
  <?php endforeach; ?>
</div>
</div>
</div>
