
<div class="bordure center blocGemme flexContainer justify-content-center">
    <div>
        <ol>
            <div class = "menu">
                    <h1><?= $gemmes -> gemmesNom ?></h1>
            </div>
            <div>
                <img class= "gemmeImg" src=<?= $gemmes-> gemmesImage ?>>
            </div>
            <div>
                <li>Prix</li>
                <p><?= $gemmes-> gemmesPrix ?>€</p>
            </div>
            <div>
                <li>Lieu</li>
                <p><?= $gemmes-> gemmesLieu?></p>
            </div>
            <div>
                <li>Description</li>
                <p><?= $gemmes-> gemmesDescription?></p>
            </div>
            <div>
                <li>Type</li>
                <p><?= $gemmes -> typeNom ?></p>
            </div>
            <div>
                <li>Rarete</li>
                <p><?= $gemmes -> raretelevel?></p>
            </div>
        </ol>
    </div>
</div>
