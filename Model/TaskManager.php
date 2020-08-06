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
        public function newTask($contentTask, $id){
            $bdd = $this -> bddconnect();
            // Insertion
            $req = $bdd->prepare('INSERT INTO task(id_section ,content, status, date) VALUES (:id_section ,:content, :status,CURDATE())');
            $req->execute(array(    
            'content' => $contentTask,
            'status' => 0,
            'id_section' => $id));
            return $req;
        }
        public function listSection($id){
            $bdd = $this -> bddconnect();
            // Insertion
            $req = $bdd->prepare('SELECT * FROM section WHERE :id_project ORDER BY id asc');
            $req->execute(array(
                'id_project' => $id));
            return $req;
        }
        public function newSection($contentSection, $id){
            $bdd = $this -> bddconnect();
            // Insertion
            $req = $bdd->prepare('INSERT INTO section(id_project ,content, date) VALUES (:id_project ,:content, CURDATE())');
            $req->execute(array(    
            'content' => $contentSection,
            'id_project' => $id));
            return $req;
        }
}
    
