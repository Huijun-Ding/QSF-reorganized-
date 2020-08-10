<?php
    session_start();
    session_destroy();
    header('location: http://'.$_SERVER['HTTP_HOST'].'/QSF-reorganized-/FONCTIONNALITE/ACCUEIL/index.php');
    exit;
?>
