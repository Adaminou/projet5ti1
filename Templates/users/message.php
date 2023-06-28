<h1>Vos messages</h1>

<?php foreach ($messages as $message) : ?>
    <div class="message">
        <p><?= $message->utilisateurLastname ?></p>
        <div class="flex">
            <p><?= $message->messageText ?></p>
            <a href="supprimer-msg?id=<?= $message->messageId ?>">X</a>
        </div>
        <p><?= $message->messageDate . ' ' . $message->messageHeure ?></p>
    </div>
<?php endforeach; ?>

<div class="flexContainer justify-content-center main">
    <form method="post" action="">
        <fieldset>
            <legend>Ajouter un message</legend>
            <div class="mb-3">
                <label for="chat" class="form-label">Votre message</label>
                <textarea id="chat" name ="chat" rows="5" cols ="33" ></textarea>
            </div>
            <button name="btnEnvoi" class="btn btn-primary">Envoyer</button>
        </fieldset>
</div>