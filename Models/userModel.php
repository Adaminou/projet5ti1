<?php

function createUser($pdo){
    try {
        $query = "insert into utilisateur(utilisateurLastname, utilisateurSurname, utilisateurEmail, utilisateurMdp) values (:utilisateurLastname, :utilisateurSurname, :utilisateurEmail, :utilisateurMdp)";
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'utilisateurLastname' => $_POST['nom'],
            'utilisateurSurname' => $_POST['prenom'],
            'utilisateurEmail' => $_POST['email'],
            'utilisateurMdp' => $_POST['mot_de_passe']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function ChercherUser($pdo){
    try {
        $query = "select * FROM utilisateur WHERE utilisateurEmail = :utilisateurEmail and utilisateurMdp = :utilisateurMdp";
        $chercheUser = $pdo->prepare($query);
        $chercheUser->execute([
            'utilisateurEmail' => $_POST['email'],
            'utilisateurMdp' => $_POST['mot_de_passe'],
        ]);
        $user = $chercheUser -> fetch();
        if ($user) {
            var_dump("coucou");
            $_SESSION['user']=$user;
        }
        var_dump($user);
        var_dump($_SESSION);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function updateUser($pdo){
try {
    $query = "update utilisateur set utilisateurLastname = :utilisateurLastname, utilisateurSurname = :utilisateurSurname, utilisateurMdp = :utilisateurMdp where utilisateurID = :utilisateurID";
    $changeUser = $pdo->prepare($query);
    $changeUser->execute([
        'utilisateurLastname' => $_POST['nom'],
        'utilisateurSurname' => $_POST['prenom'],
        'utilisateurMdp' => $_POST['mot_de_passe'],
        'utilisateurID' =>  $_SESSION['user'] -> utilisateurID
    ]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    die($message);
}
}
function updateSession($pdo){
    try {
        $query = "select * FROM utilisateur WHERE utilisateurID = :utilisateurID";
        $chercheUser = $pdo->prepare($query);
        $chercheUser->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
        $user = $chercheUser -> fetch();
            $_SESSION['user']=$user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteUser($pdo){
    try {
        $query = "delete FROM utilisateur WHERE utilisateurID = :utilisateurID";
        $deleteUser = $pdo->prepare($query);
        $deleteUser->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}