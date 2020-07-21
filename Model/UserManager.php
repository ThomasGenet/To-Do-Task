<?php 
require ('Model/Database.php');

class UserManager extends Database{
    public function registration($admin, $pseudo, $pass_hache, $mail){
        
        $bdd = $this -> bddconnect();
    // Insertion
        $req = $bdd->prepare('INSERT INTO member(pseudo, pass, mail, date_inscription) VALUES (:pseudo_member, :pass_member, :mail_member, CURDATE())');
        $req->execute(array(
            'pseudo_member' => $pseudo,
            'pass_member' => $pass_hache,
            'mail_member' => $mail));
        return $req;
    }
    public function pseudodouble($pseudo){
        $bdd = $this -> bddconnect();
        //Chercher si il y a un doublon
        $request = $bdd->prepare('SELECT id FROM membre WHERE pseudo_member = :pseudo_member');
        $request->execute(array(
            'pseudo_member' => $pseudo));
        return $request;
    }
    public function maildouble($mail){
        $bdd = $this -> bddconnect();
        //Chercher si il y a un doublon
        $request = $bdd->prepare('SELECT id FROM membre WHERE mail_member = :mail_member');
        $request->execute(array(
            'mail_member' => $mail));
        return $request;
    }
    //Se connecter
    public function connect($mail_signin){

        $bdd = $this -> bddconnect();
        //  Récupération de l'utilisateur et de son pass hashé
        $request = $bdd->prepare('SELECT id, pseudo_member, admin_member, pass_member FROM membre WHERE mail_member = :mail_member');
        $request->execute(array(
            'mail_member' => $mail_signin));
        $resultat = $request->fetch();
        return $resultat;
        
    }
    
    public function logout(){
        //A finir !!!!!!!!!!! 
       
       // Suppression des variables de session et de la session
       $_SESSION = array();
       session_destroy();
                                   
       // Suppression des cookies de connexion automatique
       setcookie('login', '');
       setcookie('pass_hache', '');
       
                                   
    }
    
}
