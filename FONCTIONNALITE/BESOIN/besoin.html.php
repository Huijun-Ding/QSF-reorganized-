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
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES BESOINS </h1>         
              <?php is_login_new_besoin(); ?>
            </div>
            <hr>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <a href="BesoinC.php"><div class="alert alert-light" role="alert">Filtrer les besoins par catégorie</div></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
            
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php  afficher_cartes_besoins();   ?>
            </div>
          </div>
        </div>        
                
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

   
  </body>
</html>