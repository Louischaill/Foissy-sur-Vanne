<link rel="stylesheet" href="<?php echo base_url();?>assets/css/comptes_rendus.css" type="text/css"/>
<script src="<?php echo base_url();?>assets/js/compte_rendus.js"></script>
<div class="container-lg main_body">
    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?= site_url("administratif")?>'">Retourner en arrière</button>
    <h1>Comptes rendus des conseils municipaux</h1>
    <p>Vous pouvez retrouver ici les différents
        comptes rendus des conseils municipaux
        passés trier par année. Pour consulter
    une année ou un compte rendu, cliquez dessus.</p>

    <?php $nvlAnnee = 0; $fermer = 0;?>
    <?php $placem = 0;
        echo form_open('comptes_rendus/ajouter/',array('method'=>'get','style'=>'text-align:center'));
        echo form_submit('','Ajouter un compte rendu',"class='btn btn-success'");
        echo form_close();?>
    <?php foreach($Composants as $Comp): ?>
        
        <?php 
        if($nvlAnnee != $Comp->Annee){
            $nvlAnnee = $Comp->Annee;
            if($fermer != 0){
                echo '</div> 
                        </div>
                        <div class="annee">
                            <div class="annee_titre">
                                <button>▲</button>
                                <h3>'.$Comp->Annee.'</h3>
                            </div>
                            <div class="annee_container" style="display: none">
                                <div class="jour">
                                    <div class="jour_titre">
                                        <button>▲</button>
                                        <h3>Comptes rendus du '.$Date[$Comp->PrimaK].'</h3>
                                    </div>
                                    <div class="jour_container" style="display: none">
                                        <p>'.$Comp->Description.'</p>
                                    </div>'.
                                    form_open('comptes_rendus/modifier/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                                    form_submit('','Modifier',"class='btn btn-warning'"),
                                    form_close(),
                                    form_open('comptes_rendus/delete/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                                    form_submit('','🗑️',"class='btn btn-danger'"),
                                    form_close().'
                                </div>';
            }elseif ($fermer == 0) {
                $fermer = 1;                
                echo '<div class="annee">
                            <div class="annee_titre">
                                <button>▲</button>
                                <h3>'.$Comp->Annee.'</h3>
                            </div>
                            <div class="annee_container" style="display: none">
                                <div class="jour">
                                    <div class="jour_titre">
                                        <button>▲</button>
                                        <h3>Comptes rendus du '.$Date[$Comp->PrimaK].'</h3>
                                    </div>
                                    <div class="jour_container" style="display: none">
                                        <p>'.$Comp->Description.'</p>
                                    </div>'.
                                    form_open('comptes_rendus/modifier/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                                    form_submit('','Modifier',"class='btn btn-warning'"),
                                    form_close(),
                                    form_open('comptes_rendus/delete/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                                    form_submit('','🗑️',"class='btn btn-danger'"),
                                    form_close().'
                                </div>';
            }
        }elseif ($nvlAnnee == $Comp->Annee) {
            
            echo '
                    <div class="jour">
                        <div class="jour_titre">
                            <button>▲</button>
                            <h3>Comptes rendus du '.$Date[$Comp->PrimaK].'</h3>
                        </div>
                        <div class="jour_container" style="display: none">
                            <p>'.$Comp->Description.'</p>
                        </div>'.
                            form_open('comptes_rendus/modifier/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                            form_submit('','Modifier',"class='btn btn-warning'"),
                            form_close(),
                            form_open('comptes_rendus/delete/'.$Comp->PrimaK,array('method'=>'get','style'=>'text-align:center')),
                            form_submit('','🗑️',"class='btn btn-danger'"),
                            form_close().'
                    </div>';
        }
        ?>
        
    <?php endforeach; ?>
         
        </div>
    </div>
</div>
