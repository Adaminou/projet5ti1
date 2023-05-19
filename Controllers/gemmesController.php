<?php

require_once "Models/gemmeModel.php";

$uri = $_SERVER["REQUEST_URI"];

if($uri === "/index.php" || $uri === "/"){
    selectAllGemme($pdo);
    var_dump($gemmes);
    require_once "Templates/gemmes/pageAccueil.php";
}
?>
<!-- test -->