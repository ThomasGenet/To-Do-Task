<?php $title = 'Log'; ?>
<?php ob_start();?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>S'inscrire</p>
        </div>

        <div class="form-content">
            <form action="index.php?action=registration" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Votre email" name="mail" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre pseudo" name="pseudo" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" name="pass" />
                        </div>
                    </div>
                </div>
                <input type="submit" class="btnSubmit" />
            </form>
        </div>
    </div>
    <div class="form">
        <div class="note">
            <p>Se connecter</p>
        </div>

        <div class="form-content">
            <form action="index.php?action=connect" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Votre email" name="mail_log" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" name="pass_log" />
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
