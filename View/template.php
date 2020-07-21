<!--Je suis le fichier template on passera par moi pour afficher les différentes vues-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../Public/CSS/bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/CSS/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ;?> </title>
   
</head>

<body>
<nav id="navbar-custom" class="navbar navbar-default navbar-fixed-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <!-- votre menu ICI -->
        </nav>



        <div class="container-fluid" >
            <div class="app-main-content">
            <?= $content; ?>
                <!-- votre contenu ICI -->
                
            </div>
        </div>

        <footer>
        <p>Copyright Thomas Genet Openclassrooms 2020</p>
    </footer> 

    




</body>
</html>