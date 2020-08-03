<?php $title = 'Mon Blog erreur'; ?>

<?php ob_start() ?>
<div class="row">
    <div class="container">
        <img src="../Public/IMG/tete.jpg" class="rounded mx-auto d-block" alt="..." style="width:200px">
    </div>
</div>
<div class="row">

    <div class="col">

        <ul class="list-group">
            <?php foreach($infoUsers as $infoUser):?>
               
            <li class="list-group-item">
                <?= $infoUser['pseudo'] ?>
                
            </li>
            <li class="list-group-item">
                <?= $infoUser['mail'] ?>
            </li>
            <li class="list-group-item">
                <?= $infoUser['date_create'] ?>
            </li>
            <li class="list-group-item">
                <?= $infoUser['city'] ?>
            </li>
            <?php endforeach;?>
        </ul>

    </div>
    
</div>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>