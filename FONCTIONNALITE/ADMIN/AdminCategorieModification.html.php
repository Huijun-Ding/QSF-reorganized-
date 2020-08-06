<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
     <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
<body>
     <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>            
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
              <h1>Modifier une catégorie</h1>      
              <hr>
              <form action="AdminCategorieFonction.php" method="POST">
               <?php
                $T = $_GET['t'];
                $query = "select CodeC, NomC, DescriptionC, PhotoC from categories where CodeC = $T ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
    
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Nom de catégorie</label>');
                        echo ('<input type="text" name="nomc" class="form-control col-md-4" id="inputEmail4" maxlength="20" value="'.$ligne["NomC"].'" required>');
                        echo ('</div>');
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">Description de catégorie</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="descriptionc" required>'.$ligne["DescriptionC"].'</textarea>') ;
                        echo('</div>') ;
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">URL de photo</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="photoc" required>'.$ligne["PhotoC"].'</textarea>') ;
                        echo('</div>') ;
       
                     echo('<hr>');
                     echo('<div class="form-group">');
                        echo('<button name="modifier" type="submit" value="'.$ligne["CodeC"].'" class="btn btn-dark btn-lg">MODIFIER</button>');
                     echo('</div>');
                }

                 ?> 
              </form>    
          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>    
  </body>
</html>