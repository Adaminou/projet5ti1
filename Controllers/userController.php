<?php

$uri = $_SERVER["REQUEST_URI"];

require_once "Models/userModel.php";

if($uri === "/inscription"){
    if(isset($_POST["btnEnvoi"])){
        $messageErrorLogin = verifData();
        if (!isset($messageErrorLogin)){
        createUser($pdo);
        header('location:/connexion');
        }
    }
require_once "Templates/users/inscription.php";

}elseif ($uri === "/connexion") {
    if(isset($_POST["btnEnvoi"])){
            ChercherUser($pdo);
            header('location:/');
}
    require_once "Templates/users/connexion.php";
}elseif ($uri === "/deconnexion") {
    session_destroy();
    header('location:/');

}elseif ($uri === "/profil") {
    //require_once "Templates/users/profil.php";
}



///TEST


function verifData(){
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '', $value))) {
            $messageErrorLogin[$key] = "Votre " .$key. " est invalide ";
        }

    }
    
    return $messageErrorLogin;
}
///TEST
?>