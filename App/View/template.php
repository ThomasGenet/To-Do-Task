<!--Je suis le fichier template on passera par moi pour afficher les différentes vues-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="App/Public/CSS/bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="App/Public/CSS/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ;?> </title>

</head>

<body>

    <nav id="navbar-custom" class="navbar navbar-default navbar-fixed-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <h1>To Do Task</h1>
            </a>
            <br>
            <?php if(isset($_SESSION['id'])){ ?>
            <span id="city" style="display: none;"><?= $_SESSION['city'] ?></span>
            <img id="weather" src="../Public/IMG/edit.png " width="45" height="45" alt="avatar">
            <br>
            
            <a href="index.php?action=logout">Deconnexion</a>
            <br>
            <a href="index.php?action=account">Mon compte</a>
            <?php }else{?>
            <a href="index.php">Se connecter</a>
            
            <?php } ?>
            
        </div>
        <ul class="nav justify-content-center">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <?php if(isset($_SESSION['id'])){ ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=project">Projet</a>
            </li>
            <?php }else{}?>
        </ul>
        <footer>
            <p>Copyright Thomas Genet Openclassrooms 2020</p>
        </footer>
    </nav>




    <div class="container-fluid">
        <div class="app-main-content">
            <?= $content; ?>
        </div>
    </div>

    <script src="App/Public/Javascript/API.js"> </script>
    <script src="App/Public/Javascript/main.js"> </script>
</body>
</html>