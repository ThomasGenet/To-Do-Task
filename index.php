<?php //Je suis le fichier routeur du site blog ecrivain
session_start();

require ('App/Controller/ControllerFront.php');


try{
    if (isset($_GET['action'])){
        if($_GET['action']== 'registration'){
            registration();
        }elseif($_GET['action']== 'connect'){
                connect();
    
        }
        elseif($_GET['action']=='project'){
            if(isset($_SESSION['id'])){
                listProject();
            }else{
                throw new Exception("Vous n'êtes pas connecté");
                
            }
            
        }
        elseif($_GET['action']== 'newProject'){
            newProject();
        }
        elseif($_GET['action']=='listTask'){
            if(isset($_GET['id'])){
                
                listTask($_GET['id']);
            }
            else{
                throw new Exception("Pas de tâche");
            }
        }
        elseif($_GET['action']== 'newTask'){
            if(isset($_GET['idSection'])){
                
                newTask($_GET['idSection']);
            }
            else{
                throw new Exception("Pas de nouvelle tâche");
            }
        }
        elseif($_GET['action']== 'newSection'){
            if(isset($_GET['id'])){
                newSection($_GET['id']);
            }
        }
        elseif($_GET['action']== 'logout'){
            logout();
        }
        elseif($_GET['action']=='account'){
            customer();
        }
        elseif($_GET['action']='avatarfile'){
            if(isset($_GET['id'])){
                avatarfile($_GET['id']);
            }
            else{
                throw new Exception("Pas de fichier avatar");
            }
        }
        else{
            throw new Exception("manque d'info");
        }
    }
    
    else{
        pagedefault();
    }
}
catch (Exception $e) {
    Error($e);
  }