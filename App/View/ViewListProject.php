<?php $title = 'Listes des projets'; ?>
<?php ob_start();?>


<div class="container">
    <?php if(isset($_SESSION['id'])){?>
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
        <div class="row" id="projectList">
            <?php foreach ($listProjects as $listProject): ?>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $listProject ['title'] ?></h5>

                        <a href="index.php?action=listTask&id=<?= $listProject['id']?>" class="card-link">Voir le
                            projet</a>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>

        </div>
        <div class="row" id="row2">
            <ul class="pagination pagination-lg">
                <button class="btn" id="lastPage"><</button>
                        
                <button class="btn" id="nextPage">></button>
            </ul>

        </div>
        <?php }else{?>
        <h3>Veuillez vous connecter</h3>
        <?php }?>

    </div>



    <?php $content = ob_get_clean();?>

    <?php require ('template.php');?>