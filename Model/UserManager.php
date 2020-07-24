<?php 
require ('Model/Database.php');

class UserManager extends Database{
    public function registration($pseudo, $pass_hache, $mail){
        
        $bdd = $this -> bddconnect();
    // Insertion 
        $req = $bdd->prepare('INSERT INTO member(pseudo, mail, pass, date_create) VALUES (:pseudo, :mail, :pass, CURDATE())');
        //$req = $bdd->exec('INSERT INTO member(pseudo, mail, pass, date_create) VALUES (\''.$pseudo.'\,\''.$mail.'\',\''.$pass_hache.'\',CURDATE()  )');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass_hache,
            'mail' => $mail));
            
        return $req;
        
    }
    public function pseudodouble($pseudo){
        $bdd = $this -> bddconnect();
        //Chercher si il y a un doublon
        $request = $bdd->prepare('SELECT id FROM member WHERE pseudo = :pseudo');
        $request->execute(array(
            'pseudo' => $pseudo));
        return $request;
    }
    public function maildouble($mail){
        $bdd = $this -> bddconnect();
        //Chercher si il y a un doublon
        $request = $bdd->prepare('SELECT id FROM member WHERE mail = :mail');
        $request->execute(array(
            'mail' => $mail));
        return $request;
    }
    //Se connecter
    public function connect($mail_signin){

        $bdd = $this -> bddconnect();
        //  Récupération de l'utilisateur et de son pass hashé
        $request = $bdd->prepare('SELECT id, mail, pass FROM member WHERE mail = :mail');
        $request->execute(array(
            'mail' => $mail_signin));
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
