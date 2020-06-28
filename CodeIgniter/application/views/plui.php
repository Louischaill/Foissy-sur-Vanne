<link rel="stylesheet" href="<?php echo base_url();?>assets/css/PLUI.css" type="text/css"/>
<div class="container-lg main_body">
    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?= site_url("administratif")?>'">Retourner en arrière</button>
    <?php foreach($Data as $Comp): ?>
    <h1><?php echo $Comp->TitreDom; ?></h1>

    <div class="container-lg text_section ecole_section" id="ecole">
        <h3><?php echo $Comp->Titre; ?></h3>
        <p><?php echo $Comp->Description; ?></p>
    </div>
    <div class="container-md retrouvez">
        <p>Retrouvez <a href="<?php echo $Comp->Lien; ?>">ici</a> l’intégralité du PLUI au niveau de nos différentes communes.
        Le document complet est disponible ci dessous en pdf.</p>
    </div>
    <div class="button container-sm">
        <h4>Télécharger le pdf</h4>
    </div>
    <?php endforeach; ?>
</div>