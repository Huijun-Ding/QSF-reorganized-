<?php session_start(); ?>
<!doctype html>
<html lang="fr">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="jumbotron">
          <div class="container">
	    <?php require_once $_SESSION["APPLICATION"].'/BDD/categorie.bdd.php'; ?>	
            <h1> ABONNER DES CATEGORIES </h1>
            <hr>
            <form  action="ReabonnerCategories.php" method="post">			  
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php afficher_categories() // afficher toutes les catégories?>      
                </div>
            <hr>       
            <div>           
                <button type="submit" class="btn btn-dark">Abonner</button>
            </div>
            </form>
          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>   
  </body>
</html>

