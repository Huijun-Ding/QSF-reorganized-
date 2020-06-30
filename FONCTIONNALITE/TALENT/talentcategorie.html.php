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
              <h1>LES TALENTS PAR CATEGORIE </h1>
              <?php is_login_new_talent(); ?>
            </div>
            <hr>
            
            <div class="row">
                <div class="col-2">
                <form action="TalentC.php" method="post">
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

                $categorie = $_POST['categorie'];   // récupérer la valeur de la catégorie choisi CodeC

                if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                     $query = " select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$categorie} and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                 } elseif (isset($_POST['typeV'])) {
                      $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$categorie} and (t.TypeT = '{$_POST['typeV']}' OR b.TypeT ='Pro et Perso') order by CodeT DESC";
                 } else {
                      $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$categorie} order by CodeT DESC";
                 }
               
                $result = mysqli_query ($session, $query);

                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher les talents par catégorie*/
                   if ($ligne["VisibiliteT"] == 1) {
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
              }
              ?>             
              </div>
            </div>
            </div>
          </div>
        </div>       
                
      <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
   
  </body>
</html>