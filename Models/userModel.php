<?php

function createUser($pdo){
    try {
        $query = "insert into utilisateurs(utilisateurLastname, utilisateurSurname, utilisteurID, utilisateurMdp, role) values (:utilisateurLastname, :utilisateurSurname, :utilisteurID, :utilisateurMdp, :role)";
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'utilisateurLastname' => $_POST['nom'],
            'utilisateurSurname' => $_POST['prenom'],
            'utilisteurID' => $_POST['login'],
            'utilisateurMdp' => $_POST['mot_de_passe'],
            'role' => 'user'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function ChercherUser($pdo){
    try {
        $query = "select * FROM utilisateurs WHERE utilisteurID = :utilisteurID and utilisateurMdp = :utilisateurMdp";
        $chercheUser = $pdo->prepare($query);
        $chercheUser->execute([
            'utilisteurID' => $_POST['login'],
            'utilisateurMdp' => $_POST['mot_de_passe'],
        ]);
        $user = $chercheUser -> fetch();
        if ($user) {
            $_SESSION['user']=$user;
        }
        var_dump($user);
        var_dump($_SESSION);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}



/*try {
    $query = "SELECT * FROM biens";
    $ajoute = $pdo->prepare($query);
    $ajoute->execute();
    $biens = $ajoute->fetchAll();
} catch (PDOException $e) {
    $message = $e->getMessage();
    die($message);
}
echo '<pre>' , var_dump($biens) , '</pre>';*/