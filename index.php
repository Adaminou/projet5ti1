<!--    Comment faire pour que le bloc main aille jusqu'en bas.
         Pour que lorsque on se connecte et qu'on clique sur un compte sauvegardé par Google la couleur reste la même.
         Pour retirer l'ombre noir dans le btn-primary                                                         
    -->
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
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/flex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Les Gemmes</title>
</head>
<body>
<header>
        <ul class="flexContainer space-evenly">
            <li class="menu"><a href="/">Home</a></li>
            <li  class="menu">
                <?php if(isset($_SESSION['user'])) :?>
                    <a href="chat">Chat</a></li>
                    <a href="mesGemmes">Mes Gemmes</a>
                    <a href="profil">Page Profil</a></li>
                    <a href="deconnexion">Déconnexion</a>
                <?php else :?> 
                    <a href="connexion">Connexion</a>
                <?php endif ?>
            </li>
        </ul>

        

</header>
<main>

        <?php 
            require_once "Controllers/gemmesController.php"; 
            require_once "Controllers/userController.php"; 
            //var_dump($_SESSION);
        ?>
    </main>
</body>
</html>


