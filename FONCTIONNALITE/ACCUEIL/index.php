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
            <h1 id="titre1"><a href="../BESOIN/besoin.html.php" class="badge badge-light">Besoins</a></h1><br>
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
              <h1 id="titre2"><a href="../TALENT/talent.html.php" class="badge badge-light">Talents</a></h1><br>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------->
     <!--    <div class="container" id="cours">
            <div class="flex-parent d-flex flex-wrap justify-between-around mt-3">
            <h1 id="titre3"><a href="#" class="badge badge-light">Ateliers</a></h1>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Course à pied ..." aria-label="Search">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
              <div class="card" style="width: 12rem;">
                <img src="https://www.lecoindesentrepreneurs.fr/wp-content/uploads/2015/03/Logiciel-pour-la-gestion-de-projet.png" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier AI et emploi</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://lte.ma/wp-content/uploads/2016/09/Big-Data-et-marketing.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier Big data and marketing</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://www.dynamique-mag.com/wp-content/uploads/6d3e1d04a6540332e1247436547e3d49-737x405.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier Finance d'entreprise</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://resize.prod.docfr.doc-media.fr/r/720,480,center-middle,ffffff,smartcrop/img/var/doctissimo/storage/images/fr/www/medecines-douces/meditation/meditation-pleine-conscience/653552-1-fre-FR/meditation-pleine-conscience.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier découverte de la méditation en pleine conscience</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
            </div>
            <nav aria-label="Page navigation example" class="page">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Suivant</a>
                </li>
              </ul>
            </nav>
          </div>  -->
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <!--  <div class="container" id="projets">
            <h1 id="titre4"><a href="Projet.php" class="badge badge-light">Projet</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <a href="Creer1Projet.php"><button type="button" class="btn btn-light">Ajouter un nouveau projet</button></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
           
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php /*
            require_once('Fonctions.php');
            $query = "select p.TitreP, c.PhotoC from projet p, categories c where p.CodeC = c.CodeC order by CodeP DESC limit 5";
            $result = mysqli_query ($session, $query);
            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
            while ($ligne = mysqli_fetch_array($result)) {                        /* Afficher les 5 talents les plus récents */
            /*
                echo ('<div class="card" style="width: 12rem;">');
                echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                echo ('<div class="card-body card text-center">');
                echo ('<h5 class="card-title">'.$ligne["TitreP"].'</h5>');
                echo ('<a href="" class="btn btn-outline-dark">Je participe</a>'); 
                echo ('</div>');  
                echo ('</div>');               
            }                */
            ?>
            </div>
              
            <nav aria-label="Page navigation example" class="page">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Suivant</a>
                </li>
              </ul>
            </nav>
            </div>  ---->
<!--------------------------------------------------------------------------------------------------------------------------------------------
            <div class="container">
              <div class="flex-parent d-flex flex-wrap justify-between-around mt-3">
                <h1 id="titre5"><a href="#" class="badge badge-light">Vie ma vie</a></h1>
                <form class="form-inline my-2 my-lg-0" class="recherche">
                  <input class="form-control mr-sm-2" type="search" placeholder="Chargé(e) de projet ..." aria-label="Search">
                  <button type="button" class="btn btn-outline-dark">Recherche</button>
                </form>
              </div>
            	<div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Chargé(e) de recrutement <-> Responsable administratif adjoint
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Date : 23/02/2020 <br><br>
                    Lieu : Toulouse <br><br>
                    Mission du post 1 : Rédiger et publier des offres d’emplois attractives, via notre ATS « Jobaffinity » ;
                    Suivre les annonces, tri des CV, présélections téléphoniques ;
                    Conduire les entretiens de recrutement individuels ou collectifs, selon les profils, avec les opérationnels ;
                    Gérer l’intégralité du processus de recrutement et participer à la prise de décision ; <br><br>
                    Mission du post 2 : Contribue à la réalisation et au suivi des objectifs stratégiques de l’organisme en assistant la direction locale; Participe à la mise en œuvre opérationnelle de la politique impulsée par la direction régionale; Mobilise les collaborateurs autour des missions, ambitions et objectifs de l’échelon et les accompagne dans les changements engagés, les nouvelles organisations.<br>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Chargé de documentation <-> Responsable adjoint(e) service administration du personnel
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Date : <br>
                    Lieu : <br>
                    Mission du post 1 : <br>
                    Mission du post 2 : <br>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Développeur <-> Chargé(e) de projet
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    Date : <br>
                    Lieu : <br>
                    Mission du post 1 : <br>
                    Mission du post 2 : <br>
                  </div>
                </div>
              </div>
              </div>
            </div>
------------------------------------------------------------------------------------------------------------------------------------------->
        <hr/>    
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
  </body>
</html>