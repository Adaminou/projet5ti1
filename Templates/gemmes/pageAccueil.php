<h1>Les gemmes</h1>
<?php if(isset($_SESSION['user'])) :?>
<ul class="space-evenly">
   <li  class="menu"><a href="createGemme">Ajouter une gemme</a></li>
</ul>
<?php endif ?>
<div class = "flexContainer wrap">
<?php foreach ($gemmes as $gemmes) : ?>
   <div class ="bordure center blocGemme">
         <img class = gemmeImg src="<?= $gemmes -> gemmesImage ?>" alt ="Photo de la gemme">
         <h2><?= $gemmes -> gemmesNom ?></h2>
         <p><span><?= $gemmes -> gemmesPrix ?>€</span>
         <p><a href="voirGemme?gemmesID=<?= $gemmes -> gemmesID ?>">Voir la gemme</a></p>
   </div>
 <?php endforeach ?>
</div>