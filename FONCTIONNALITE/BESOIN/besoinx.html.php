<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
    <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
            <div class="container">
               <?php
                require_once('Fonctions.php');
                $T = $_GET['t'];
                $query = "select  b.TypeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DatePublicationB, b.DescriptionB, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeB = '$T' ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if (strtotime($ligne["DateButoireB"]) >= strtotime(date("yy/m/d")) && $ligne["VisibiliteB"] == 1) {   
                        echo ('<h1>'.$ligne["TitreB"]. '</h1>');                        
                        echo ('<h3> Date Butoire: '.$ligne["DateButoireB"].'</h3>');
                        echo ('<p> Date Publication: '.$ligne["DatePublicationB"].'</p>');
                        echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." height="200" style="width: 20rem;"</p>');
                        echo ('<p><strong>Type: </strong>'.$ligne["TypeB"].'</p>');                        
                        echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionB"].'</p>'); 
                    
                    echo ('<hr>');
                    if(isset($_SESSION['email'])){
                       echo ('<a href="MailBesoin.php?t='.$ligne["TitreB"].'"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    } else {
                       echo ('<a href="Login.php"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    }   
                }
                }
                 ?>
            </div>
        </div>
         
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

        
    </body>
</html>

