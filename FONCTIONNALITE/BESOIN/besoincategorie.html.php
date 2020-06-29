<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
   <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
          
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES BESOINS PAR CATEGORIE </h1>
              <?php is_login_new_besoin(); ?>
            </div>
            <hr>
            <div class="row">
                <div class="col-2">
            <form action="BesoinC.php" method="post">
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="1">Sport</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="2">Animation</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="3">Outil métiers</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="4">Développement personnel</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="5">Associatif</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="6">Covoiturage</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="7">Bureautique</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="8">Informatique</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="9">Loisir</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="10">Autres</button>           
            </form> 
            </div>
            <div class="col-10">
              <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
              <?php
              require_once('Fonctions.php');
    
                if (isset($_POST['categorie'])) {
                    $categorie = $_POST['categorie'];
                    if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                        $query = "select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeC = {$categorie} and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                    } elseif (isset($_POST['typeV'])) {
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeC = {$categorie} and (b.TypeB = '{$_POST['typeV']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                    } else {
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeC = {$categorie} order by b.CodeB DESC";
                    }

                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins qui n'atteignent pas sa date butoire par l'ordre chronologique */
                    if ($ligne["VisibiliteB"] == 1) {   
                        if ($ligne["TypeB"] == 'Pro et Perso') {
                            echo ('<div><h5><span class="badge badge-info">'.$ligne["TypeB"].'</span></h5>');
                        } elseif ($ligne["TypeB"] == 'Pro') {
                            echo ('<div><h5><span class="badge badge-success">'.$ligne["TypeB"].'</span></h5>');
                        } elseif ($ligne["TypeB"] == 'Perso') {
                            echo ('<div><h5><span class="badge badge-warning">'.$ligne["TypeB"].'</span></h5>');
                        }                                     
                            echo ('<div class="card" style="width: 12rem;">');                                 
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$ligne["TitreB"].'</h5>');
                            echo ('<p class="card-text">Délais souhaité: '.$ligne["DateButoireB"].'</p>');
                            echo ('<a href="BesoinX.php?t='.$ligne["CodeB"].'" class="btn btn-outline-dark">Voir la demande</a>'); 
                            echo ('</div>');  
                            echo ('</div></div>');   
                    }
                } 
                }
              ?>            
              </div>
            </div>
            </div>
          </div>
        </div>
                
                
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNAILITE/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>