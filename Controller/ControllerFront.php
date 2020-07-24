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
    $pseudodouble -> closeCursor();

    $request = new UserManager;
    $maildouble = $request -> maildouble($mail);
    $countmail = $maildouble -> rowCount();
    $maildouble -> closeCursor();
    //Test pseudo déjà utilisé
    
    if(!$count > 0){
        if(!$countmail > 0){
            //Test mot de passe + de 10 caractère
            if($str > 10){
                
                $requ = new UserManager;
                $infoRegist = $requ -> registration($pseudo, $pass_hache, $mail);
                //$infoRegist -> closeCursor();
               
                //header ('Location: index.php');
                exit();
            }
            else{
                throw new Exception("Votre mot de passe doit contenir au minimum 10 caractère.");
                //header ('Location: index.php');
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
    $mail_signin = htmlspecialchars($_POST['mail_log']);
    $pass_member = htmlspecialchars($_POST['pass_log']);
    
    
    // Comparaison du pass envoyé avec la base via le formulaire 
    $request = new UserManager;
    $infoUser = $request -> connect($mail_signin);
    
        if (!$infoUser)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if (password_verify($pass_member, $infoUser['pass'])) {
                
                $_SESSION['id_member'] = $infoUser['id'];
                $_SESSION['pseudo'] = $infoUser['pseudo'];
                echo "vous êtes connecté";
                //header ('Location: index.php');
                //exit();
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