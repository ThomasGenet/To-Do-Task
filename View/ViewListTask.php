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
        <?php //var_dump($listSections, $listTasks);?>
        <?php $idSection = 0;
        foreach ($listSections as $listSection): 
            if($idSection == 0){
                $idSection = $listSection['id'];
            }
            if($idSection != $listSection['id']){
                ?>
                </div>
                <div>
        <?php
            $idSection = $listSection['id'];
            }
            else{
                while()
            }
        ?>
            <div class="list-group-item"> <?= $listSection['content'] ?></div>

            <div class="list-group-item">
                <?php foreach ($listTasks as $listTask): ?>
                    <div class="list-group-item"> <?= $listTask['content'] ?></div>
                <?php endforeach;?>
            </div>

            <div class="list-group-item">
                <form action="index.php?action=newTask&idSection=<?= $listSection['id']?>" method="post">
                    <textarea name="taskContent" id="" cols="50" rows="1" class="md-textarea form-control"
                        placeholder="Nouvelle tâche"></textarea>
                    <input type="submit" class="btnSubmit" />
                </form>
            </div>
        <?php endforeach;?>
    </div>


</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>