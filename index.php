<?php
session_start();
require_once "Config/databaseConnexion.php";
/*$sth = $pdo->prepare("select * from Utilisateur");
$sth->execute();
/* Récupération de toutes les lignes d'un jeu de résultats 
print("Récupération de toutes les lignes d'un jeu de résultats :\n"); 
$result = $sth->fetchAll(PDO::FETCH_OBJ); 
print_r($result);*/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Les Gemmes</title>
</head>
<body>
<header>
        <ul class="flex space-evenly">
            <li class="menu"><a href="/">Home</a></li>
            <li  class="menu"><a href="profil">Page Profil</a></li>
            <li  class="menu">
                <?php if(isset($_SESSION['user'])) :?>
                    <a href="deconnexion">Déconnexion</a>
                <?php else :?> 
                    <a href="connexion">Connexion</a>
                <?php endif ?>
            </li>
        </ul>
</header>
<main>
        <?php 
            //var_dump($_SESSION);
            require_once "Controllers/gemmesController.php"; 
            require_once "Controllers/userController.php"; 
            //var_dump($_SESSION);
        ?>
    </main>
</body>
</html>