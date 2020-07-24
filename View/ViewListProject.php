<?php $title = 'Listes des projets'; ?>
<?php ob_start();?>


<div class="container">

</div>
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Title project</h5>
            
            <p class="card-text">Faux text</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>

</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>