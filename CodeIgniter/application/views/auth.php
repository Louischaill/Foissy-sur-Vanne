<div id="connexion">
    <div class="container-lg main_body">
        <div class="login-wrapper">
            <div class="panel panel-default" style="align-items: center">
                <div class="panel-heading">
                    <div class="img-container">
                        <img src="<?php echo base_url(); ?>assets/img/equipe.jpg" alt="Avatar" class="avatar"
                             style="width: 65%;">
                    </div>
                </div>
                <div class="panel-body">
                    <?php $error = $this->session->flashdata("error"); ?>
                    <div class="alert alert-<?php echo $error ? 'warning' : 'info' ?> alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <?php echo $error ? $error : 'Entrer votre pseudonyme et votre mot de passe' ?>
                    </div>

                    <?php echo form_open('auth/authenti', array()); ?>
                    <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="username"></label>
                        <input type="text" name="username" value="<?php echo set_value("username") ?>" id="username"
                               placeholder="Pseudonyme">
                        <?php echo $error; ?>
                    </div>
                    <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="password"></label>
                        <input type="password" name="password" value="<?php echo set_value("password") ?>"
                               id="password" placeholder="Mot de passe">
                        <?php echo $error; ?>
                    </div>
                    <input type="submit" value="Connexion" class="btn btn-primary">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
