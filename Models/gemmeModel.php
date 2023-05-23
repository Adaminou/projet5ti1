<?php
function deleteUsersGemmes($pdo){
    try {
        $query = "delete FROM utilisateurs_gemmes_magasins WHERE utilisateurID = :utilisateurID";
        $deleteUserGemmes = $pdo->prepare($query);
        $deleteUserGemmes->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectAllGemme($dbh)
{
    try {
        $query = 'select * FROM gemmes';
        $selectGemme = $dbh-> prepare($query);
        $selectGemme->execute();
        $gemmes = $selectGemme ->fetchAll();
        return $gemmes;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}