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
        for ($i=0; $i < count($_POST["type"]); $i++) { 
        $typeID = $_POST["type"][$i];
        ajouterTypesGemmes($pdo, $gemmesID, $typeID);
        
        }
    }
    $types = selectAllTypes($pdo);
    $raretes = selectAllRarete($pdo);
    require_once "Templates/gemmes/editGemmesOrGemmes.php";
}
elseif (isset($_GET["gemmesID"]) &&  $uri === "/voirGemme?gemmesID=" . $_GET["gemmesID"]) {
    $gemmes = selectOneGemme ($pdo);
    require_once "Templates/gemmes/voirGemme.php";
}
/*elseif ($uri === "/mesGemmes") {  
    $gemmes = selectMyGemmes($pdo);
    require_once "Templates/gemmes/pageAccueil.php";
}*/