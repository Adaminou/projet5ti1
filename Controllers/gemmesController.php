<?php

require_once "Models/gemmeModel.php";
require_once "Models/typeModel.php";
require_once "Models/rareteModel.php";

$uri = $_SERVER["REQUEST_URI"];

if($uri === "/index.php" || $uri === "/"){
    $gemmes = selectAllGemme($pdo);
    
    require_once "Templates/gemmes/pageAccueil.php";
}
elseif ($uri === "/createGemme") {
    if(isset($_POST["btnEnvoi"])){
        var_dump($_POST);
        createGemme($pdo);
        $gemmesID = $pdo -> lastInsertId();
        $typeID = $_POST["type"];
        ajouterTypesGemmes($pdo, $gemmesID, $typeID);
        $_SESSION['flashMessage'] = "Votre gemme a bien été créée!";
        $_SESSION['flashColor'] = "success";
        header("location:/mesGemmes");
    }
    $types = selectAllTypes($pdo);
    $raretes = selectAllRarete($pdo);
    require_once "Templates/gemmes/editGemmesOrGemmes.php";
}
elseif ($uri === "/mesGemmes") {  
    $gemmes = selectMyGemmes($pdo);
    require_once "Templates/gemmes/pageAccueil.php";
}   
elseif (isset($_GET["gemmesID"]) &&  $uri === "/voirGemme?gemmesID=" . $_GET["gemmesID"]) {
    $gemmes = selectOneGemme ($pdo);
    require_once "Templates/gemmes/voirGemme.php";
}
elseif (isset($_GET["gemmesID"]) && $uri === "/deleteGemme?gemmesID=" . $_GET["gemmesID"]) {
    deleteOneGemme($pdo);
    header("location:/mesGemmes");
}
elseif (isset($_GET["gemmesID"]) && $uri === "/updateGemme?gemmesID=" . $_GET["gemmesID"]) {
    if (isset($_POST['btnEnvoi'])) {
        updateGemme($pdo);
        $typeID = $_POST["type"];
        ajouterTypesGemmes($pdo, $gemmesID, $typeID);
        header("location:/mesGemmes");
        }
    $gemmes = selectOneGemme($pdo);
    $types = selectAllTypes($pdo);
    $raretes = selectAllRarete($pdo);
    require_once "Templates/gemmes/editGemmesOrGemmes.php";
}