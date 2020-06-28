<?php
define("REP_APPLI","/QSF-reorganized-");
$_SESSION["REP_APPLI"] = REP_APPLI;
$_SESSION["APPLICATION"] = $_SERVER['DOCUMENT_ROOT'].REP_APPLI;
?>

<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNAILITE/header.php'; ?>
  <body>
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNAILITE/nav.php'; ?>
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
            require_once $_SESSION["APPLICATION"].'/Fonctions(SupprimerApres).php';
            
            if(isset($_SESSION['email'])){
                echo('<a href="https://eva.beta.gouv.fr/"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            } else {
                echo ('<a href="Login.php"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            }
            ?>
             </div>
            </div>
        </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="besoins">
            <h1 id="titre1"><a href="Besoin.php" class="badge badge-light">Besoins</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motB" placeholder="Fitness/Excel/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_besoin(); 
                    $query = "UPDATE besoins SET VisibiliteB = 0 WHERE CURDATE() > DateButoireB";
                    mysqli_query ($session, $query);
                ?>
            </div>
   
            <div id="cartesB" class="flex-parent d-flex flex-wrap justify-content-around mt-3">     
            <?php
            require_once('Fonctions.php');

            if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
            } elseif (isset($_GET['typeV'])){    
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_GET['typeV']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
            } else {
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
            }

            if(isset($_GET['motB']) AND !empty($_GET['motB'])) {     /*Recherche par mot clé*/
                $mot = htmlspecialchars($_GET['motB']);
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
           
            <div id="page_navigation"> </div>
         </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="talents">
              <h1 id="titre2"><a href="Talent.php" class="badge badge-light">Talents</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">

              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motT" placeholder="Animation/BI/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_talent(); ?>
            </div>

            <div id="cartesT" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php                      
            if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_SESSION['type']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
            } elseif (isset($_GET['typeV'])) {
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_GET['typeV']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
            } else {
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";
            }


            if(isset($_GET['motT']) AND !empty($_GET['motT'])) {     /*Recherche par mot clé*/
                $mot = htmlspecialchars($_GET['motT']);
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
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNAILITE/footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
  </body>
</html>