<h1>Les gemmes</h1>
<?php if(isset($_SESSION['user'])) :?>
<ul class="space-evenly">
   <li  class="menu"><a href="createGemme">Ajouter une gemme</a></li>
</ul>
<?php endif ?>

<?php if(isset($_SESSION['flashMessage'])) : ?>
   <?php require_once "Component/alertFlashMessage.php"; ?>
<?php endif ?>

<div class = "flexContainer wrap">
<?php foreach ($gemmes as $gemmes) : ?>
   <div class ="bordure center blocGemme">
         <img class = gemmeImg src="<?= $gemmes -> gemmesImage ?>" alt ="Photo de la gemme">
         <h2><?= $gemmes -> gemmesNom ?></h2>
         <p><span><?= $gemmes -> gemmesPrix ?>€</span>
         <p><a href="voirGemme?gemmesID=<?= $gemmes -> gemmesID ?>">Voir la gemme</a></p>
         <?php if ($uri === "/mesGemmes") : ?>
         <div class = "flexContainer justify-content-center">
         <div>
                <p><a class ="btn btn-primary" href="updateGemme?gemmesID=<?= $gemmes->gemmesID ?>">Modifier l'école</a></p>
         </div>
         <div>
                <p><a class="btn btn-thirday" href="deleteGemme?gemmesID=<?= $gemmes->gemmesID ?>">Supprimer l'école</a></p>
         </div>
         </div>
            <?php endif ?>
   </div>
 <?php endforeach ?>
</div>