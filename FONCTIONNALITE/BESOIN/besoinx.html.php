<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
    <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
            <div class="container">
               <?php require_once $_SESSION["APPLICATION"].'/BDD/besoin.bdd.php'; ?>	
               <?php un_besoinx(); ?>
            </div>
        </div>       
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>       
    </body>
</html>

