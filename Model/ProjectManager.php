<?php 
require_once ('Model/Database.php');

class ProjectManager extends Database{
    public function listProject(){
        $bdd = $this -> bddconnect();
        // Insertion
        $req = $bdd->query('SELECT * FROM project ORDER BY id asc');
        return $req;
    }
    public function newProject($title, $id){
        $bdd = $this -> bddconnect();

        $req = $bdd->prepare('INSERT INTO project(id_member, title, date_project) VALUES (:id_member, :title, CURDATE())');
        $req->execute(array(
            'title' => $title,
            'id_member' => $id));
        return $req;
    }

}