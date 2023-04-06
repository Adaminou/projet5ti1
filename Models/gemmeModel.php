<?php
function deleteUsersGemmes($pdo){
    try {
        $query = "delete FROM gemmes WHERE utilisateurID = :utilisateurID";
        $deleteUserGemmes = $pdo->prepare($query);
        $deleteUserGemmes->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}