<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
   <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
   <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
            <?php require_once $_SESSION["APPLICATION"].'/BDD/talent.bdd.php'; ?>		
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES TALENTS </h1>
              <?php //is_login_new_talent(); ?>
            </div>
            <hr>         
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <!-- Button trigger modal pour le filtrage multiple-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">  
                三 Filtre
                </button>
                <!-- formulaire pour les requêtes selon les critères-->
                <form action="besoin.html.php" method="post">   
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter les besoins</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <h3> Par catégorie </h3>                      
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="1"><strong> Sport</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="2"><strong> Animation</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="3"><strong> Outil métiers</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="4"><strong> Développement personnel</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="5"><strong> Associatif</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="6"><strong> Covoiturage</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="7"><strong> Bureautique</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="8"><strong> Informatique</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="9"><strong> Loisir</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="10"><strong> Autres</strong></label>                      
                        <?php     
                        if (empty($_SESSION['email'])) {
                            echo ('<br><br>');
                            echo ('<h3> Par type </h3><p>(Ne pas choisir si vous voulez tout afficher)</p>');
                            echo ('<label class="radio-inline"><input type="radio" name="type" value="Pro"><em><strong>Pro</strong></em></label>');
                            echo ('<label class="radio-inline"><input type="radio" name="type" value="Perso"><em><strong>Perso</strong></em></label>');
                        }                          
                      ?>
                      </div>                        
                      <div class="modal-footer">
                        <button type="reset" value="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                 <!-- Moteur de recherche par mot clé-->
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div> 
            <!-- Affichage des cartes talents-->
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php afficher_cartes_talents();  ?>
            </div>
          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
  </body>
</html>