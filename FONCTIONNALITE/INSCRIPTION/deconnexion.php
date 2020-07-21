<?php
    session_name('UTILISATEUR');
    session_start();
    session_destroy();
    header('location: '.$_SESSION['APPLICATION'].'/FONCTIONNALITE/ACCUEIL/index.php');
    exit;
?>
