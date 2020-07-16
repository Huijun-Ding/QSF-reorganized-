<?php session_start(); ?>
<!doctype html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
    <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
            <div class="container">
               <?php require_once $_SESSION["APPLICATION"].'/BDD/talent.bdd.php'; ?>	
               <?php un_talentx(); //Afficher les informations d'un talent ?>     
            </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>     
    </body>
</html>

