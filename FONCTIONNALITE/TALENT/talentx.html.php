<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
    <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
            <div class="container">
               <?php require_once $_SESSION["APPLICATION"].'/BDD/talent.bdd.php'; ?>	
               <?php un_talentx(); ?>     
            </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>     
    </body>
</html>

