<?php 
require_once ('Model/Database.php');

class TaskManager extends Database{
        public function listTask($id){
            $bdd = $this -> bddconnect();
            // Insertion
            $req = $bdd->prepare('SELECT * FROM task WHERE :id ORDER BY id asc');
            $req->execute(array(
                'id' => $id));
            return $req;
            
        }
    }

