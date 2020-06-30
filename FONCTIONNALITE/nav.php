<?php 
echo('<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">');
        echo('<a class="navbar-brand" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/ACCUEIL/index.php'.'">Quai des savoir-faire</a>'); 
      echo('<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">');
      echo('<span class="navbar-toggler-icon"></span>');
      echo('</button>');

      echo('<div class="collapse navbar-collapse" id="navbarSupportedContent">');
        echo('<ul class="navbar-nav mr-auto">');
          echo('<li class="nav-item active">');
              echo('<a class="nav-link" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/ACCUEIL/index.php'.'">Accueil<span class="sr-only">(current)</span></a>');  
          echo('</li>');
          echo('<li class="nav-item">');
             echo('<a class="nav-link" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/BESOIN/besoin.html.php'.'">Besoins</a> '); 
          echo('</li>');
          echo('<li class="nav-item">');
             echo('<a class="nav-link" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/TALENT/talent.html.php'.'">Talents</a>'); 
          echo('</li>');
          echo('<li class="nav-item">');
            echo('<a class="nav-link" href="'.$_SESSION["APPLICATION"].'/FONCTIONNALITE/CATEGORIE/categorie.html.php'.'">Catégories</a>');  
          echo('</li>');
        echo('</ul>');
        
          echo('<form  method="get">');
          
           require_once $_SESSION["APPLICATION"].'/FONCTIONCOMMUN/fonctionutile.php';
           
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" class="btn btn-secondary btn-sm">Pro et Perso</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Pro">Pro</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Perso">Perso</button>');
                echo ('</div>');
            }  
         
          echo('</form>');

        echo('<ul class="navbar-nav ml-auto">');
          echo('<li class="nav-item dropleft">');
          
            
            
            if(isset($_SESSION['email'])){
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</a>');
            } else {
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur";                   //Utilisateur qui n'a pas conncté
                echo('</a>');
            } 
          
            echo('<div class="dropdown-menu" aria-labelledby="navbarDropdown">');
                
                if(isset($_SESSION['email'])){
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/MONESPACE/monprofil.html.php'.'">Mon profil</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/MONESPACE/mescategories.html.php'.'">Mes catégories</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/INSCRIPTION/deconnexion.php'.'" onclick="Deconnexion()">Déconnecter</a>');
              
                    echo('<script>');
                        function Deconnexion() {
                            alert("Déconnexion réussite !");
                            }
                    echo('</script>');
              
                } else {
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/INSCRIPTION/connexion.html.php'.'">Se connecter</a>');
                    echo ('<a class="dropdown-item" href="'.$_SESSION["APPLICATION"].'FONCTIONNALITE/INSCRIPTION/inscription.html.php'.'">S\'inscrire</a>');
                }
             
            echo('</div>');
          echo('</li>');
        echo('</ul>');
      echo('</div>');
    echo('</nav>');
 ?>
