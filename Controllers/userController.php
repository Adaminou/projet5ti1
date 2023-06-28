<?php

$uri = $_SERVER["REQUEST_URI"];

require_once "Models/userModel.php";
require_once "Models/gemmeModel.php";
require_once "Models/chatModel.php";

// PARTIE UTILISATEUR
if($uri === "/inscription"){
    var_dump("coucou");
    if(isset($_POST["btnEnvoi"])){
        
        $messageErrorLogin = verifData();
        var_dump($messageErrorLogin);
        if (!$messageErrorLogin){
        createUser($pdo);
        header('location:/connexion');
        }
    }
require_once "Templates/users/inscriptionOrEditProfil.php";

}elseif ($uri === "/connexion") {
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
        deleteUsersGemmes($pdo);
        deleteUser($pdo);
        session_destroy();
        header('location:/connexion');
    }
    require_once "Templates/users/inscriptionOrEditProfil.php";
    
// Partie DISCUSSION/CHAT

}elseif ($uri === "/chat") {
        $utilisateurs = selectAllUsers($pdo); 
        if(isset($_POST["btnEnvoi"])){
            $chatID = createChat($pdo, 'groupe');
            foreach($_POST['users'] as $users) {
                addUserChat($pdo, $chatId, $users);
            }
            header("location: message?groupId=" . $chatId);
            return;
        }
        $chatGroupe = selectChatGroupe($pdo);
        require_once "Templates/users/chat.php";

}else if (str_starts_with($uri, '/supprimer-msg?id=')){
    $message = selectMsg($pdo, $_GET['id']);
    if ($message->messageText === 'Ce message a été supprimé.') {
        deleteMsg($pdo, $_GET['id']);
    } else {
        updateMsg($pdo, $_GET['id'], 'Ce message a été supprimé.');
    }
    header('location:/chat');

}elseif (str_starts_with( $uri , "/message")) {
    if (isset($_GET['groupId'])) {
        $chatId = $_GET["groupId"];
    } else {
        $chat = selectChatUser($pdo, $_SESSION["user"]->utilisateurID, $_GET["id"]);
        if($chat){
            $chatId = $chat->conversationId;
        }
        else{
            $chatId = createChat($pdo, 'binaire');
            addUserChat($pdo, $chatId, $_SESSION["user"]->utilisateurID);
            addUserChat($pdo, $chatId, $_GET["id"]);
        }
    }
    if(isset($_POST["btnEnvoi"])){
        sendMsg($pdo, $_POST["chat"], $_SESSION['user']->utilisateurID, $chatId);
        if (isset($_GET['groupId'])) {
            header("location: message?groupId=" . $_GET["groupId"]);
        } else {
            header("location: message?id=" . $_GET["id"]);
        }
        return;
    }

    $messages = selectMsgChat($pdo, $chatId);

    require_once "Templates/users/message.php";

}


// verification data
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