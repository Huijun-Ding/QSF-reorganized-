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
              <h1>LES TALENTS </h1>
              <?php is_login_new_talent(); ?>
            </div>
            <hr>
            
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <a href="TalentC.php"><div class="alert alert-light" role="alert">Filtrer par catégorie</div></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div> 
            
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php
            if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                   $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_SESSION['type']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
               } elseif (isset($_GET['typeV'])) {
                   $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_GET['typeV']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
               } else {
                   $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";
               }

            if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
                    $mot = htmlspecialchars($_GET['mot']);
                    $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.TitreT LIKE '%$mot%' order by t.CodeT DESC";
            }

               $result = mysqli_query ($session, $query);

               if (mysqli_num_rows($result)>0) {       
                   while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                     if ($ligne["VisibiliteT"] == 1){
                           if ($ligne["TypeT"] == 'Pro et Perso') {
                               echo ('<div><h5><span class="badge badge-info">'.$ligne["TypeT"].'</span></h5>');
                           } elseif ($ligne["TypeT"] == 'Pro') {
                               echo ('<div><h5><span class="badge badge-success">'.$ligne["TypeT"].'</span></h5>');
                           } elseif ($ligne["TypeT"] == 'Perso') {
                               echo ('<div><h5><span class="badge badge-warning">'.$ligne["TypeT"].'</span></h5>');
                           }                                  
                       echo ('<div class="card" style="width: 12rem;">');                              
                       echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                       echo ('<div class="card-body card text-center">');
                       echo ('<h5 class="card-title">'.$ligne["TitreT"].'</h5>');
                       echo ('<a href="TalentX.php?t='.$ligne["CodeT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                       echo ('</div>');   
                       echo ('</div></div>');             
                     }
                   }
               } else {
                 echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
               }                                          
            ?>
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