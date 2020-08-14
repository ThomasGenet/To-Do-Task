<?php $title = 'Mon Blog erreur'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<a href="index.php">Aller à l'accueil </a> 

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>