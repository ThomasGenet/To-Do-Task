<?php $title = 'Mon Blog erreur'; ?>

<?php ob_start() ?>
<div class="container">
    <div class="row" id="row_avatar">
        <img src="../Public/IMG/tete.jpg" class="rounded mx-auto d-block" alt="..." style="width:200px">
        
        <form action="index.php?action=avatarfile&id=<?php $_SESSION['id']?>" id="form_avatar" method="POST" enctype="multipart/form-data" >
        <label for="">Avatar :</label>
        <input type="file" name="avatar"></input>
        <input type="submit">
    </form>
    </div>
   

</div>
<div class="container">
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
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>