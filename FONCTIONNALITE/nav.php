<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../ACCUEIL/index.php">Quai des savoir-faire</a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">');
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="../ACCUEIL/index.php">Accueil<span class="sr-only">(current)</span></a> 
          </li>
          <li class="nav-item">
             <a class="nav-link" href="../BESOIN/besoin.html.php">Besoins</a>
             </li>
          <li class="nav-item">
             <a class="nav-link" href="../TALENT/talent.html.php">Talents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../CATEGORIE/categorie.html.php">Catégories</a>
          </li>
        </ul>
        
          <form  method="get">
<?php          
           require_once $_SESSION["APPLICATION"].'/FONCTIONCOMMUN/fonctionutile.php';
         
           
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" class="btn btn-secondary btn-sm">Pro et Perso</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Pro">Pro</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Perso">Perso</button>');
                echo ('</div>');
            }  
 ?>         
          </form>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft">
          
<?php              
            
            if(isset($_SESSION['email'])){
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</a>');
            } else {
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur";                   //Utilisateur qui n'a pas conncté
                echo('</a>');
            } 
 ?>          
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <?php                
                if(isset($_SESSION['email'])){
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/MONESPACE/monprofil.html.php'.'">Mon profil</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/MONESPACE/mescategories.html.php'.'">Mes catégories</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/INSCRIPTION/deconnexion.php'.'" onclick="Deconnexion()">Déconnecter</a>');
 ?>              
                    <script>
                        function Deconnexion() {
                            alert("Déconnexion réussite !");
                            }
                    </script>
 <?php             
                } else {
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/INSCRIPTION/connexion.html.php'.'">Se connecter</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/INSCRIPTION/inscription.html.php'.'">S\'inscrire</a>');
                }
  ?>                      
            </div>
          </li>
        </ul>
      </div>
    </nav>


