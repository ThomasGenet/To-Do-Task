<?php $title = 'Project'; ?>
<?php ob_start();?>


<div class="container">
        <nav class="navbar navbar-light bg-light"> 
        <ul class="nav justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <h1>To Do Task</h1> </a>
            </li> 
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Project</a>
            </li>  
        </ul>    
        </nav>
    </div>
    <div class="container">
        
            <ul class="list-group">
                <li class="list-group-tiem">
                    <form action="index.php?action=newTask">
                        <input type="checkbox" name="check" value="taskCheck">
                        <textarea name="taskContent" id="" cols="50" rows="1"></textarea>
                        
                    </form>
                </li>
            </ul>
        
    </div>
    
<?php $content = ob_get_clean();?>
<?php require ('template.php');?>