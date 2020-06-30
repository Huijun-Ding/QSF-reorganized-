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
              <h1>LES BESOINS </h1>         
              <?php 
              require_once $_SESSION["APPLICATION"].'/FONCTIONCOMMUN/fonctionutile.php';
              is_login_new_besoin(); ?>
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
            <?php
              

                if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                    $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                } elseif (isset($_GET['typeV'])) {
                    $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_GET['typeV']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                } else {
                    $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
                }

                if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
                    $mot = htmlspecialchars($_GET['mot']);
                    $query = "select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.TitreB LIKE '%$mot%' order by b.CodeB DESC";
                }

                $result = mysqli_query ($session, $query);

                    if (mysqli_num_rows($result)>0) {
                        while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
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
                        } else {
                            echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
                        }                     
                    ?>
            </div>
          </div>
        </div>        
                
        <footer>
          <p id="copyright"><em><small>copyright &#9400; Quai des savoir-faire, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>

    
  </body>
</html>