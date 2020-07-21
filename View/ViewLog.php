<?php $title = 'Log'; ?>
<?php ob_start();?>

<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Page d'inscription utilisateur</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre email" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre nom" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mot de passe" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirmation du mot de passe" value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit">S'inscrire</button>
                </div>
            </div>
        </div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>