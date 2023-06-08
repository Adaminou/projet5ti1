<?php

    $messageFlash = $_SESSION['flashMessage'];
    $color = $_SESSION['flashColor'];
    unset($_SESSION['flashMessage']);
    unset($_SESSION['flashColor']);
    

?>
<div class ="alert alert-<?= $color ?>"> <i class="fas fa-check-circle" style="color: #000000;"></i><?=$messageFlash ?></div>