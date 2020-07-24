<?php $title = 'Projet'; ?>
<?php ob_start();?>


<div class="container">

</div>
<div class="container">

    <ul class="list-group">
        <li class="list-group-item active">
            <form action="index.php?action=newTask">
                <input type="checkbox" name="check" value="taskCheck">
                <textarea name="taskContent" id="" cols="50" rows="1"></textarea>
            </form>
        </li>
    </ul>

</div>

<?php $content = ob_get_clean();?>
<?php require ('template.php');?>