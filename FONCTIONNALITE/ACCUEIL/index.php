<?php
session_name('CHEMIN');
session_start();
define("REP_APPLI","/QSF-reorganized-");
$_SESSION["REP_APPLI"] = REP_APPLI;
$_SESSION["APPLICATION"] = $_SERVER['DOCUMENT_ROOT'].REP_APPLI;

//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';
?>

<!doctype html>
<html lang="fr">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">Bienvenue au Quai des savoir-faire !</h1>
            <p class="lead">Quai des savoir-faire est une plateforme qui permet de partager les compétences entre collaborateurs.</p>
            <hr class="my-4">
            <p>Partageons nos talents, la solitarité c'est aussi entre nous.</p>
             <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">  
                <p class="lead">
                    <a href="https://notmoebius.github.io/quaidessavoirfaire/" target="_blank"><button type="button" class="btn btn-outline-dark">En savoir plus</button></a>
                </p>
             <?php
             require_once $_SESSION["APPLICATION"].'/FONCTIONCOMMUN/fonctionutile.php';
            
            if(isset($_SESSION['email'])){  //arbre aide à la décision pour découvrir les talents
                echo('<a href="https://eva.beta.gouv.fr/"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            } else {
                echo ('<a href="http://'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['REP_APPLI'].'/FONCTIONNALITE/INSCRIPTION/connexion.html.php"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            }
            ?>
             </div>
            </div>
        </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="besoins">
              <?php require_once $_SESSION["APPLICATION"].'/BDD/besoin.bdd.php'; ?>	
            <h1 id="titre1"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$_SESSION['REP_APPLI'];?>/FONCTIONNALITE/BESOIN/besoin.html.php" class="badge badge-light">Besoins</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <!-- Moteur de recherche par mot clé-->
              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motB" placeholder="Fitness/Excel/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php //is_login_new_besoin(); 
                    //$query = "UPDATE besoins SET VisibiliteB = 0 WHERE CURDATE() > DateButoireB";
                    //mysqli_query ($session, $query);
                ?>
            </div>
            <!-- L'affichage pour les cartes besoins-->
            <div id="cartesB" class="flex-parent d-flex flex-wrap justify-content-around mt-3">     
            <?php  afficher_cartes_besoins();  ?>           
            </div>
             <!-- La pagination pour les besoins-->
            <div id="page_navigation"> </div>
            <script src="pagination.js"></script>      
         </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="talents">
              <?php require_once $_SESSION["APPLICATION"].'/BDD/talent.bdd.php'; ?>	
              <h1 id="titre2"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$_SESSION['REP_APPLI'];?>/FONCTIONNALITE/TALENT/talent.html.php" class="badge badge-light">Talents</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">

              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motT" placeholder="Animation/BI/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_talent(); ?>
            </div>
            <!-- L'affichage pour les cartes talents-->
            <div id="cartesT" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php afficher_cartes_talents();   ?>                   
            </div>            
            <!-- La pagination pour les talents-->
            <div id="page_navigation2"> </div>
          </div>      

        <hr/>    
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
  </body>
</html>