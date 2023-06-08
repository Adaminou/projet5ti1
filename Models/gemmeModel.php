<?php

function createGemme($pdo){
    try {
        $query = "insert INTO GEMMES (gemmesNom, gemmesPrix, gemmesLieu, gemmesDescription, gemmesImage, rareteID, utilisateurID) values (:gemmesNom, :gemmesPrix, :gemmesLieu, :gemmesDescription, :gemmesImage,:rareteID, :utilisateurID)";
        $deleteUserGemmes = $pdo->prepare($query);
        $deleteUserGemmes->execute([
            'gemmesNom' => htmlentities($_POST["nom"]),
            'gemmesPrix' => htmlentities($_POST["prix"]),
            'gemmesLieu' => htmlentities($_POST["lieu"]),
            'gemmesDescription' => htmlentities($_POST["description"]),
            'gemmesImage' => htmlentities($_POST["image"]),
            'rareteID' => htmlentities($_POST["rarete"]),
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
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
function deleteOneGemme($pdo)
{
    try {
        $query = 'delete from gemmes where gemmesID = :gemmesID';
        $deleteAllGemmesFromID = $pdo->prepare($query);
        $deleteAllGemmesFromID->execute([
            'gemmesID' => $_GET["gemmesID"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteAllGemmesFromUser($pdo)
{
    try {
        $query = 'delete from gemmes where utiilisateurID = :utilisateurID';
        $deleteAllGemmesFromID = $pdo->prepare($query);
        $deleteAllGemmesFromID->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function updateGemme($pdo){
    try {
        $query = "update gemmes set gemmesNom = :gemmesNom, gemmesPrix = :gemmesPrix, gemmesLieu = :gemmesLieu, gemmesDescription = :gemmesDescription, gemmesImage = :gemmesImage, rareteID = :rareteID where gemmesID = :gemmesID";
        $deleteAllGemmesFromID = $pdo->prepare($query);
        $deleteAllGemmesFromID->execute([
            'gemmesNom' => htmlentities($_POST["nom"]),
            'gemmesPrix' => htmlentities($_POST["prix"]),
            'gemmesLieu' => htmlentities($_POST["lieu"]),
            'gemmesDescription' => htmlentities($_POST["description"]),
            'gemmesImage' => htmlentities($_POST["image"]),
            'rareteID' => htmlentities($_POST["rarete"]),
            'gemmesID' => $_GET['gemmesID']
        ]);

    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }

}

function selectMyGemmes($pdo)
{
    try {
        $query = "select * FROM gemmes WHERE utilisateurID = :utilisateurID";
        $selectGemme = $pdo->prepare($query);
        $selectGemme->execute([
            'utilisateurID' => $_SESSION['user'] -> utilisateurID
        ]);
        $gemmes = $selectGemme -> fetchAll();
        return $gemmes;
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

function selectOneGemme($pdo){

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
