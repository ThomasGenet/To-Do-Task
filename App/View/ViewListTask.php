<?php $title = 'Projet'; ?>
<?php ob_start();?>


<div class="containers">
    <div class="list-group">
        <form action="index.php?action=newSection&id=<?= $_GET['id']?>" method="post">
            <textarea name="sectionContent" id="" cols="50" rows="1" class="form-control z-depth-1"
                placeholder="Nouvelle section"></textarea>
            <input type="submit" class="btnSubmit" />
        </form>
    </div>
</div>

<div class="containers">
    <div class="list-group">
        <?php $idSection = 0;?>

        <?php foreach ($listTasks as $listTask): ?>

        <?php   
            if ($idSection == 0) {
                $idSection = $listTask['id_section'];?>

        <div class="list-group-item"> <?= $listTask['section_content'] ?>
            <?php
            }
            
            if($idSection != $listTask['id_section']){ 
                ?> <div class="list-group-item">
                <form action="index.php?action=newTask&idSection=<?= $listTask['id_section']?>" method="POST">
                    <textarea name="taskContent" id="" cols="50" rows="1" class="md-textarea form-control"
                        placeholder="Nouvelle tâche"></textarea>
                    <input type="submit" class="btnSubmit" />
                </form>
            </div>
        </div>

        <div class="list-group-item"> <?= $listTask['section_content'] ?>
            <?php
                $idSection = $listTask['id_section'];
                ?>

            <?php
            
            }
            ?>
            <div class="list-group-item"> <?= $listTask['content'] ?></div>



            <?php endforeach;?>
            <div class="list-group-item">
            <form action="index.php?action=newTask&idSection=<?= $listTask['id_section']?>" method="post">
                <textarea name="taskContent" id="" cols="50" rows="1" class="md-textarea form-control"
                    placeholder="Nouvelle tâche"></textarea>
                <input type="submit" class="btnSubmit" />
            </form>
            </div>
        </div>

    </div>


</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>