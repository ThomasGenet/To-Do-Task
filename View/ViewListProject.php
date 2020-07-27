<?php $title = 'Listes des projets'; ?>
<?php ob_start();?>


<div class="container">
<div class="form">
        <div class="note">
            <p>Ajouter un projet</p>
        </div>
<div class="form-content" id="form-content">
            <form action="index.php?action=newProject" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nom du projet" name="title" />
                        </div>
                    </div>
                    
                </div>
                <input type="submit" class="btnSubmit" />
            </form>
        </div>
</div>
<div class="container" id="container_project">
    <div class="row">
<?php foreach($listProjects as $listProject): ?>
    <div class="col-sm" >
    <div class="card" >
        <div class="card-body">   
            <h5 class="card-title"><?= $listProject ['title'] ?></h5>

            <a href="index.php?action=listTask&id=<?= $listProject['id']?>"  class="card-link">Voir le projet</a>
        </div>
        
    </div>
    </div>
    <?php endforeach; ?>
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>