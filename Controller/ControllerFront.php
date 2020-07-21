<?php 
require_once ('./Model/UserManager.php');



function registration(){

    // Vérification de la validité des informations
    $admin = 0;
    $pseudo = htmlspecialchars($_POST['pseudo']);
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $mail = htmlspecialchars($_POST['mail']);
    $str = strlen($_POST["pass"]);

    $req = new UserManager;
    $pseudodouble = $req -> pseudodouble($pseudo);
    $count = $pseudodouble -> rowCount();

    $request = new UserManager;
    $maildouble = $request -> maildouble($mail);
    $countmail = $maildouble -> rowCount();
    //Test pseudo déjà utilisé
    //die(var_dump($count));
    if(!$count > 0){
        if(!$countmail > 0){
            //Test mot de passe + de 10 caractère
            if($str > 10){
                $requ = new UserManager;
                $infoRegist = $requ -> registration($admin, $pseudo, $pass_hache, $mail);
                header ('Location: index.php?action=FormLog');
                exit();
            }
            else{
                throw new Exception("Votre mot de passe doit contenir au minimum 10 caractère.");
                header ('Location: index.php?action=FormLog');
                exit();
            }
        }
        else{
            throw new Exception("Votre mail est déjà utilisé.");
        }
        
    }
    else{
        throw new Exception("Votre pseudo est déjà utilisé.");
        
    }
    
}

function connect(){
    $mail_signin = htmlspecialchars($_POST['mail_member_login']);
    $pass_member = htmlspecialchars($_POST['pass_member_login']);
    
    
    // Comparaison du pass envoyé avec la base via le formulaire 
    $request = new UserManager;
    $infoUser = $request -> connect($mail_signin);
    
        if (!$infoUser)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if (password_verify($pass_member, $infoUser['pass_member'])) {
                session_start();
                $_SESSION['id_member'] = $infoUser['id'];
                $_SESSION['admin'] = $infoUser['admin_member'];
                $_SESSION['pseudo'] = $infoUser['pseudo_member'];
                header ('Location: index.php');
                exit();
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }

    
    require ('./View/ViewLog.php');
    
}
function logout(){
    $req = new UserManager;
    $req -> logout();
    header ('Location: index.php');
    exit();
}
function pagedefault(){
    require('./View/ViewLog.php');
}
function Error($e){
    $msgErreur = $e->getMessage();
    require ('./View/ViewError.php');
}