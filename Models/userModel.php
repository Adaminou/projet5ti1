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