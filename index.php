<?php //Je suis le fichier routeur du site blog ecrivain
session_start();

require('./Controller/ControllerFront.php');
require('./Controller/ControllerBack.php');

try{
    if (isset($_GET['action'])){
        if($_GET['action']== 'registration'){
            registration();
        }elseif($_GET['action']== 'log'){
            if(isset($_GET['id'])){
                connect();
            }
            else{
                throw new Exception("manque d'info connect");
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