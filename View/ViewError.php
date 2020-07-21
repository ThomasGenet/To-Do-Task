<?php $title = 'Mon Blog erreur'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>