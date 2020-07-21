<!--Je suis le fichier template on passera par moi pour afficher les différentes vues-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="..//Public/CSS/bootstrap-4.5.0-dist/css/bootstrap.min.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ;?> </title>
   
</head>

<body>
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

</body>
</html>