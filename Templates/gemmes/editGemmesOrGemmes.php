<link rel="stylesheet" href="CSS/style.css">
<h1>Ajouter une gemme</h1>
    <form action="" method="post">
            <fieldset>
            <legend>Ajouter une gemme</legend>
            <div class="mb-3">
                <label for="nom" class="form-label">Entrez un nom de gemme</label>
                <input name="nom" type="text" id="Nom" placeholder="Nom" class="form-control" value="">
                <?php if(isset($messageError["nom"])) : ?> <p> <?= $messageError["nom"] ?> </p> <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="lieu" class="form-label">Donnez le lieu de récolte de la gemme</label>
                <input name="lieu" type="text" id="lieu" placeholder="Lieu" class="form-control" value="">
                <?php if(isset($messageError["lieu"])) : ?> <p> <?= $messageError["lieu"] ?> </p> <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Entrez le lien de votre image :</label>
                <input name="image" type="text" id="image" placeholder="Lien" class="form-control" value="">
                <?php if(isset($messageError["image"])) : ?> <p> <?= $messageError["image"] ?> </p> <?php endif ?>
            </div>
            <div class="mb-3" class="form-label">
                <label for="note">Etablissez le prix de votre gemme: </label>
                <input name="prix" type="number" id="prix" placeholder="Prix" class="form-control" value="">
                <?php if(isset($messageError["prix"])) : ?> <p> <?= $messageError["prix"] ?> </p> <?php endif ?>
            </div>
            <div class="mb-3" class="form-label">
                <label for="description">Donner une description à votre gemme</label>
                <input name="description" type="text" id="description" placeholder="Description" class="form-control" value="">
                <?php if(isset($messageError["description"])) : ?> <p> <?= $messageError["description"] ?> </p> <?php endif ?>
            </div>
            <div class="mb-3" class="form-label">
            <label for="type-select">Selectionnez un type</label>
            
                <select name="type" id="type-select" required>
                <?php foreach ($types as $type) : ?>
                    <option value="<?= $type-> typeID  ?>"><?= $type->typeNom ?></option>

                    <?php endforeach ?>  
                </select>
            </div>           
            <div class="mb-3" class="form-label">
            <label for="rarete-select">Selectionnez une rareté</label>
                <select name="rarete" id="rarete-select" required>
                <?php foreach ($raretes as $rarete) : ?>
                    <option value="<?= $rarete-> rareteID  ?>"><?= $rarete -> raretelevel ?></option>
                    <?php endforeach ?>  
                </select>
            </div>      
            </fieldset>
        
            <div class="Add">
                <button name="btnEnvoi" class="btn btn-primary" value="envoyer"><?php if(isset($_SESSION["user"])) : ?>Ajouter <?php else : ?>Envoyer<?php endif ?></button>
        </div>
</form>