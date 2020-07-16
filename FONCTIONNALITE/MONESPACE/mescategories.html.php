<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
<body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
            <hr>
            <center><h1>Mes Abonnements</h1></center>
            <hr> <input class="card-text" type="checkbox" onclick="ToutDesabonner()" id="parent1" name="selectall" value="">  <strong> <span id="label1">Tout désabonner </span></strong>
            <form  action="DesabonnerCategories.php" method="post">
            <div class="row">
                <div class="col-10">
                    <div id="carteb" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
                    require_once('Fonctions.php');

                    $query = " select c.NomC,c.PhotoC,c.CodeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);
                        
                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */       
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');
                        echo ('<input class="card-text" type="checkbox" id="Child_Checkbox1" name="'.$ligne["CodeC"].'" value="'.$ligne["CodeC"].'">');
                        echo ('</div>');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('</div>');
                        echo ('</div>'); 
                    }          
                    } else {
                                echo("<h5> Vous n'avez pas encore s'abonné à des catégories </h5>");
                            } 
                  ?>      
                    </div>
                </div>
                <script src="toutabonner.js"></script>

                <div class="col-2">
                   <button type="submit" class="btn btn-dark">Désabonner</button> 
                </div>          
            </div>
            </form>
          </div>             

          <div class="container">
            <hr>
            <center><h1> Abonnements Disponibles </h1> </center>  <!--Tous les catégories qui restent-->
                <hr>  <input class="card-text" type="checkbox" onclick="ToutAbonner()" id="parent" name="selectall" value="">  <strong> <span id="label">Tout abonner </span></strong>
           
            
            <form  action="ReabonnerCategories.php" method="post">	
            <div class="row">
                <div class="col-10">
            
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
                    require_once('Fonctions.php');

                    $query = "select NomC, PhotoC, CodeC from categories where codeC not in ( select c.codeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = $usercode )";
                    $result = mysqli_query ($session, $query);      
                        
                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */  
                      
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');
                        echo ('<input class="card-text" type="checkbox" id="Child_Checkbox" name="'.$ligne["CodeC"].'" value="'.$ligne["CodeC"].'">');
                        echo ('</div>');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('</div>');
                        echo ('</div>'); 
                    }          
                    } else {
                                echo("<h5> Vous avez abonné toutes les catégories </h5>");
                            } 
                          ?>      
                    </div>
                </div>
                
                <div class="col-2">
            <div>           
                <button type="submit" class="btn btn-dark">Abonner</button>
            </div>
                    </div>
                    </div>
                        </form>
          </div>
        </div>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
 
</body>
</html>