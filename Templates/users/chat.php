
<div class="flexContainer justify-content-center">
<h1>Lancer une discussion</h1>
</div>
<div class="flexContainer justify-content-center">
<?php foreach ($utilisateurs as $utilisateur) : ?>
    <?php if ($utilisateur->utilisateurID !== $_SESSION['user']->utilisateurID): ?>
        <a class href="message?id=<?= $utilisateur -> utilisateurID?>">Discuter avec <p><?= $utilisateur->utilisateurLastname ?></p></a> 
        
    <?php endif ?>
<?php endforeach ?>
</div>

<div class ="flexContainer justify-content-center">
<form action="" method="post">
    <h1>Créer un chat groupé</h1>
    <div>
    <select name="users" id="users-select" multiple require>
        <?php foreach($utilisateurs as $utilisateur): ?>
            <?php if ($utilisateur->utilisateurID !== $_SESSION['user']->utilisateurID): ?>
                <option value="<?= $utilisateur->utilisateurID ?>"><?= $utilisateur->utilisateurLastname ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
    <div>
    <input type="submit" value="Envoyer" name="btnEnvoi">
</form>

<ol>
<?php foreach ($chatGroupe as $chat) : ?>
    <li><a class="" href="message?groupId=<?= $chat -> conversationId?>">Chat groupé numéro :<?= $chat -> conversationId?></a></li>
<?php endforeach ?>
</ol>
</div>
