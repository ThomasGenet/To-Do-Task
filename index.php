<?php //Je suis le fichier routeur du site blog ecrivain
session_start();

require('./Controller/ControllerFront.php');
require('./Controller/ControllerBack.php');

try{
    if (isset($_GET['action'])){
        if($_GET['action']== 'log'){

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