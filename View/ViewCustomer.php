<?php $title = 'Mon Blog erreur'; ?>

<?php ob_start() ?>
<div class="row">
    <div class="container">
        <img src="../Public/IMG/tete.jpg" class="rounded mx-auto d-block" alt="..." style="width:200px">
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>