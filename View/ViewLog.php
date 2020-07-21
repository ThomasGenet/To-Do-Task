<?php $title = 'Log'; ?>
<?php ob_start();?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Page d'inscription utilisateur</p>
        </div>

        <div class="form-content">
            <form action="index.php?action=registration" method="POST">
                <div class="row">
fiel
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Votre email" name="mail" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre nom" name="pseudo" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" name="pass" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirmation du mot de passe"
                                name="pass2" />
                        </div>
                    </div>
                </div>
                <input type="submit" class="btnSubmit" />
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>