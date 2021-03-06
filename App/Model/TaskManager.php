<?php 
require_once ('vendor/autoload.php');
use App\Model\Database;

class TaskManager extends Database{
        public function listTask($id){
            $bdd = $this -> bddconnect();
            //select section.content as section_content, task.content, task.id, section.id as id_section from section left join task on section.id=task.id_section where section.id_project=1 order by section.id ASC

            $req = $bdd->prepare('SELECT section.content as section_content, task.content, task.id, section.id as id_section from section left join task on section.id=task.id_section where section.id_project= :id order by section.id ASC');
            $req->execute(array(
                'id' => $id));
            return $req;
            
        }
        public function newTask($contentTask, $idSection){
            $bdd = $this -> bddconnect();
            // Insertion d'une condition WHERE idSection
            $req = $bdd->prepare('INSERT INTO task(id_section ,content, status, date) VALUES (:id_section ,:content, :status,CURDATE()) ');
            $req->execute(array(    
            'content' => $contentTask,
            'status' => 0,
            'id_section' => $idSection));
            return $req;
        }
        public function updatetask($idTask, $content){
            $bdd = $this -> bddconnect();
            $req = $bdd->prepare('UPDATE task SET content = :content WHERE id = :id');
            $req->execute(array(    
                'content' => $content,
                'id' => $idTask));
                return $req;
        }
        public function deleteTask($idTask){
            $bdd = $this -> bddconnect();
            $req = $bdd->prepare('DELETE FROM task WHERE id = :id');
            $req->execute(array(
                'id' => $idTask));
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
    

