<?php

function createGemme($pdo){
    try {
        $query = "insert INTO GEMMES (gemmesNom, gemmesPrix, gemmesLieu, gemmesDescription, gemmesImage, rareteID) values (:gemmesNom, :gemmesPrix, :gemmesLieu, :gemmesDescription, gemmesImage,: rareteID)";
        $deleteUserGemmes = $pdo->prepare($query);
        $deleteUserGemmes->execute([
            'gemmesNom' => $_POST["nom"],
            'gemmesPrix' => $_POST["prix"],
            'gemmesLieu' => $_POST["lieu"],
            'gemmesDescription' => $_POST["description"],
            'gemmesImage' => $_POST["image"],
            'rareteID;' => $_POST["rarete"],
        ]);

    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }

}
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
function selectMyGemmes($pdo){
    try {
        $query = "select FROM gemmes WHERE utilisateurID = :utilisateurID";
        $selectGemme = $pdo->prepare($query);
        $selectGemme->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
        $gemmes = $selectGemme -> fetchAll();
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectAllGemme($pdo)
{
    try {
        $query = 'select * FROM gemmes';
        $selectGemme = $pdo-> prepare($query);
        $selectGemme->execute();
        $gemmes = $selectGemme ->fetchAll();
        return $gemmes;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectOneGemme ($pdo){

    try {
        $query = "SELECT gemmes.*, rarete.*, type.* FROM gemmes JOIN rarete ON gemmes.rareteID = rarete.rareteID JOIN gemmes_type ON gemmes.gemmesID = gemmes_type.gemmesID JOIN type ON gemmes_type.typeID = type.typeID WHERE gemmes.gemmesID = :gemmesID;";
        $selectGemme = $pdo->prepare($query);
        $selectGemme->execute([
            'gemmesID' => $_GET['gemmesID']
        ]);
        $gemmes = $selectGemme -> fetch();
        return $gemmes;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
