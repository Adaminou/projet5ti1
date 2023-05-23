<?php

$uri = $_SERVER["REQUEST_URI"];

require_once "Models/userModel.php";
require_once "Models/gemmeModel.php";

if($uri === "/inscription"){
    var_dump("coucou");
    if(isset($_POST["btnEnvoi"])){
        
        $messageErrorLogin = verifData();
        var_dump($messageErrorLogin);
        var_dump("coucou2");
        if (!$messageErrorLogin){
        var_dump("coucou3");
        createUser($pdo);
        header('location:/connexion');
        }
    }
require_once "Templates/users/inscriptionOrEditProfil.php";

}elseif ($uri === "/connexion") {
    var_dump($_SESSION);
    if(isset($_POST["btnEnvoi"])){
            ChercherUser($pdo);
            header('location:/');
    }
    require_once "Templates/users/connexion.php";
}elseif ($uri === "/deconnexion") {
    session_destroy();
    header('location:/');

}elseif ($uri === "/profil"){
    if(isset($_POST["btnEnvoi"])){
        updateUser($pdo);
        updateSession($pdo);
        header('location:/profil');
    }
    if(isset($_POST["btnSupression"])){
        var_dump("coucou");
        deleteUsersGemmes($pdo);
        deleteUser($pdo);
        session_destroy();
        header('location:/connexion');
    }
    require_once "Templates/users/inscriptionOrEditProfil.php";
}


function verifData(){
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '', $value))) {
            $messageErrorLogin[$key] = "Votre " .$key. " est invalide ";
        }

    }
    if(isset($messageErrorLogin)) {
    return $messageErrorLogin;
}
else {
    return false;
}
}
?>