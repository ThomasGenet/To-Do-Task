<?php 
require_once ('App/Model/UserManager.php');
require_once ('App/Model/ProjectManager.php');
require_once ('App/Model/TaskManager.php');

/**
 * registration
 * connect
 * logout
 * newprojet
 *
 * @return void
 */

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
               
                header ('Location: index.php');
                exit();
            }
            else{
                throw new Exception("Votre mot de passe doit contenir au minimum 10 caractère.");
                header ('Location: index.php');
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
                
                $_SESSION['id'] = $infoUser['id'];
                $_SESSION['pseudo'] = $infoUser['pseudo'];
                $_SESSION['city'] = $infoUser['city'];
                echo "vous êtes connecté";
                header ('Location: index.php');
                exit();
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }

    
    require ('./View/ViewLog.php');
    
}
function updateCity(){
    $id = $_SESSION['id'];
    $city = htmlspecialchars($_POST['city']);
    $req = new UserManager;
    $req -> updateCity($id, $city);
    $_SESSION['city'] = $_POST['city'];
    
    header ('Location: index.php?action=account');
    exit();
}
function logout(){
    $req = new UserManager;
    $req -> logout();
    header ('Location: index.php');
    exit();
}
function newProject(){
    $title = htmlspecialchars($_POST['title']);
    $id = $_SESSION['id'];
    $req = new ProjectManager;
    $newProject = $req -> newProject($title, $id);
    header ('Location: index.php?action=project');
    exit();
}

function listProject(){
    $req = new ProjectManager;
    $listProjects = $req -> listProject();
    require('App/View/ViewListProject.php');
}
function listTask($id){
    $req = new TaskManager;
    $listTasks = $req -> listTask($id);
    $_SESSION['id_project'] = $id;
    require('App/View/ViewListTask.php');
}

function newTask($idSection){
    //Voir où trouver l'id de section
    $contentTask = htmlspecialchars ($_POST['taskContent']);
    $req = new TaskManager;
    $newTask = $req -> newTask($contentTask, $idSection);
    header ('Location: index.php?action=listTask&id=1');
    exit();
}
function updateTask($idTask){
    $content = htmlspecialchars_decode($_POST['content']);
    
    $req = new TaskManager;
    $newTask = $req -> updateTask($idTask, $content);
    header ('Location: index.php?action=listTask&id=1');
    exit();
}
function deleteTask($idTask){
    $req = new TaskManager;
    $newTask = $req -> deleteTask($idTask);
    header ('Location: index.php?action=listTask&id=1');
    exit(); 
}
function newSection($id){
    $contentSection = htmlspecialchars_decode ($_POST['sectionContent']);
    $req = new TaskManager;
    $newSection = $req -> newSection($contentSection, $id);
    header ('Location: index.php?action=project');
    exit();
}
function customer(){
    $req = new UserManager;
    $id = $_SESSION['id'];
    $infoUsers = $req -> customer($id);
    
    require('App/View/ViewCustomer.php');
}
function avatarfile(){
    
    $id = $_SESSION['id'];
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
        $sizeMax = 2097152;
        $extensions = array('jpg', 'jpeg', 'png');
        if($_FILES['avatar']['size'] <= $sizeMax){
            $extensionsUpload = strtolower(substr(strchr($_FILES['avatar']['name'], '.'), 1));
            if(in_array($extensionsUpload,$extensions)){
                $chemin = "App/Public/avatar/".$_SESSION['id'].".".$extensionsUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if($resultat){
                    $req = new UserManager;
                    $avatarFile = $req -> avatarfile($id, $extensionsUpload);
                    header ('Location: index.php?action=account');
                    exit();

                }
                else{

                }
            }
            else{
                throw new Exception('Photo profil doit etre en jpg jpeg ou png');
            }
        }
        else{
            throw new Exception('Photo profil ne doit pas dépasser 2Mo');
        }
    }
    
}

function pagedefault(){
    require('App/View/ViewLog.php');
}
function Error($e){
    $msgErreur = $e->getMessage();
    require ('App/View/ViewError.php');
}