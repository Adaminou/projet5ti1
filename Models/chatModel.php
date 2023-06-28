<?php
function selectAllUsers($pdo){
    {
        try {
            $query = 'select * FROM utilisateur';
            $selectUsers = $pdo-> prepare($query);
            $selectUsers->execute();
            $users = $selectUsers ->fetchAll();
            return $users;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }
}
function sendMsg($pdo, $messageText, $utilisateurID, $conversationId){
    try {
        $query = "INSERT INTO message (messageText, messageDate, messageHeure, utilisateurID, conversationId) VALUES (:messageText, :messageDate, :messageHeure, :utilisateurID, :conversationId)";
        $ajoutTypeGemmes = $pdo->prepare($query);
        $ajoutTypeGemmes->execute([
            'messageText' => $messageText,
            'messageDate' => date("Y-m-d"),
            'messageHeure' => date("H:i:s"),
            'utilisateurID' => $utilisateurID,
            'conversationId' => $conversationId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectMsg($pdo, $messageId) {
    try {
        $query = "SELECT * FROM message where messageId = :messageId";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute([
            'messageId' => $messageId
        ]);
        $users = $selectUsers->fetch();
        return $users;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteMsg($pdo, $messageId) {
    try {
        $query = "DELETE FROM message where messageId = :messageId";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute([
            'messageId' => $messageId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function updateMsg($pdo, $messageId, $messageText) {
    try {
        $query = "UPDATE message SET messageText = :messageText where messageId = :messageId";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute([
            'messageId' => $messageId,
            'messageText' => $messageText
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function createChat($pdo, $groupeType){
    try {
        $query = "INSERT INTO conversation (conversationType) values (:groupeType) ";
        $ajouterTypesGemmes = $pdo->prepare($query);
        $ajouterTypesGemmes->execute([
            'groupeType' => $groupeType
        ]);
        return $pdo-> lastInsertId();
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectChatUser($pdo, $userCo, $users){
    try {
        $query = "SELECT * FROM utilisateur_conversation natural join conversation where utilisateurID = :utilisateurIdConnected and conversationId in (SELECT conversationId FROM utilisateur_conversation where utilisateurID = :utilisateurID) and conversationType = 'binaire'";
        $ajouterTypesGemmes = $pdo->prepare($query);
        $ajouterTypesGemmes->execute([
            'utilisateurIdConnected' => $userCo,
            'utilisateurID' => $users
        ]);
        return $ajouterTypesGemmes->fetch();
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function addUserChat($pdo, $conversationId, $utilisateurID){
    try {
        $query = "INSERT INTO utilisateur_conversation (conversationId, utilisateurID) values (:conversationId, :utilisateurID) ";
        $ajouterTypesGemmes = $pdo->prepare($query);
        $ajouterTypesGemmes->execute([
            'conversationId' => $conversationId,
            'utilisateurID' => $utilisateurID
        ]);
        return $pdo-> lastInsertId();
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function chatGroupe($pdo){
    try {
        $query = "select * from utilisateur";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute();
        $users = $selectUsers->fetchAll();
        return $users;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function sendMsgGroupe($pdo, $conversationId, $utilisateurId ){
    try {
        $query = "INSERT INTO utilisateur_conversation (conversationId, utilisateurID  ) VALUES (:conversationId, :utilisateurID)";
        $ajouterTypesGemmes = $pdo->prepare($query);
        $ajouterTypesGemmes->execute([
            'conversationId' => $conversationId,
            'utilisateurID' => $_SESSION['user']->utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectChatGroupe($pdo) {
    try {
        $query = "SELECT * FROM conversation where conversationType = 'groupe'";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute();
        $users = $selectUsers->fetchAll();
        return $users;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectMsgChat($pdo, $chatId) {
    try {
        $query = "SELECT * FROM message natural join utilisateur where conversationId = :conversationId";
        $selectUsers = $pdo->prepare($query);
        $selectUsers->execute([
            'conversationId' => $chatId
        ]);
        $users = $selectUsers->fetchAll();
        return $users;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
