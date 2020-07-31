<?php //Je suis le fichier routeur du site blog ecrivain
session_start();

require('./Controller/ControllerFront.php');
require('./Controller/ControllerBack.php');

try{
    if (isset($_GET['action'])){
        if($_GET['action']== 'registration'){
            registration();
        }elseif($_GET['action']== 'connect'){
                connect();
    
        }
        elseif($_GET['action']=='project'){
            listProject();
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
            if(isset($_GET['id'])){
                newTask($_GET['id']);
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