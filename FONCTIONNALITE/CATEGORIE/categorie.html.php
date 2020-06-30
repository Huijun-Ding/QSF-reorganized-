<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="jumbotron">
          <div class="container">
			
            <h1> ABONNER DES CATEGORIES </h1>
            <hr>
            <form  action="ReabonnerCategories.php" method="post">			  
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php

                    $query = "select NomC, PhotoC, CodeC from categories c ";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */  
                      
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');
                        echo ('<center><input class="card-text" type="checkbox" id="inlineCheckbox" name="'.$ligne["CodeC"].'" value="'.$ligne["CodeC"].'"></center>');
                        echo ('</div>');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('</div>');
                        echo ('</div>'); 
                    }          
                    } 
                    ?>      
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

