<div class="flexContainer justify-content-center">
<form method="post" action="">
    <fieldset>
        <legend class= "h1">Inscription</legend>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="Nom" name="nom" value="<?php if(isset($_SESSION["user"])) : ?> <?= $_SESSION["user"] ->utilisateurLastname?> <?php endif ?>">
            <?php if(isset($messageErrorLogin["nom"])) : ?><p> <?= $messageErrorLogin["nom"] ?> </p> <?php endif ?> 
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" placeholder="Prénom" class="form-control" id="Prenom" name="prenom" value="<?php if(isset($_SESSION["user"])) : ?> <?= $_SESSION["user"] ->utilisateurSurname?> <?php endif ?>">
            <?php if(isset($messageErrorLogin["prenom"])) : ?><p ><?= $messageErrorLogin["prenom"] ?> </p> <?php endif ?> 
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="Email" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION["user"])) : ?> <?= $_SESSION["user"] ->utilisateurEmail?> <?php endif ?>">
            <?php if(isset($messageErrorLogin["email"])) : ?><p> <?= $messageErrorLogin["email"] ?> </p> <?php endif ?> 

        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Mot de passe</label>
            <input type="passwor<?php if(isset($_SESSION["user"])) : ?>text<?php else : ?>password<?php endif ?>" placeholder="Mot de passe" class="form-control" id="Password" name="mot_de_passe" value="<?php if(isset($_SESSION["user"])) : ?> <?= $_SESSION["user"] ->utilisateurMdp?> <?php endif ?>">
            <?php if(isset($messageErrorLogin["mot_de_passe"])) : ?><p> <?= str_replace('_', ' ', $messageErrorLogin["mot_de_passe"] )?> </p> <?php endif ?> 
        </div>
        <div>
            <button name="btnEnvoi" class="btn btn-primary">Envoyer</button>
        </div>
    </fieldset>
    <h3 class="text-danger flexContainer justify-content-center">Déjà inscrit ?</h3>
    <a href="connexion" class="btn btn-secondary">Se connecter</a>
</form>
</div>