<?php $title = 'Projet'; ?>
<?php ob_start();?>


<div class="container">
    <ul class="list-group">
        <li class="list-group-item ">

            <form action="index.php?action=newSection&id=<?= $_GET['id']?>" method="post">
                <textarea name="sectionContent" id="" cols="50" rows="1" class="form-control z-depth-1"
                    placeholder="Nouvelle section"></textarea>
                <input type="submit" class="btnSubmit" />
            </form>

        </li>
    </ul>
</div>
<div class="container">

    <ul class="list-group">
        <li class="list-group-item ">

            <form action="index.php?action=newTask&id=<?= $_GET['id']?>" method="post">
                <textarea name="taskContent" id="" cols="50" rows="1" class="md-textarea form-control"
                    placeholder="Nouvelle tâche"></textarea>
                <input type="submit" class="btnSubmit" />
            </form>

        </li>
    </ul>

</div>
<div class="container">
    <div class="list-group">
        <?php foreach ($listSections as $listSection): ?>
        <div class="list-group-item"> <?= $listSection['content'] ?></div>
        <?php endforeach;?>
    </div>
        
    <div class="list-group">
        <?php foreach ($listTasks as $listTask): ?>
        <div class="list-group-item"> <?= $listTask['content'] ?></div>
        <?php endforeach;?>
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>