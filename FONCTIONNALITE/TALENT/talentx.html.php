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
                $query = "select t.TitreT, c.PhotoC, t.DatePublicationT, t.DescriptionT from talents t, categories c where t.CodeC = c.CodeC and t.TitreT = '$T' ";
                $result = mysqli_query ($session, $query);

                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détaille de chaque talent */
                    echo ('<h1>'.$ligne["TitreT"]. '</h1><br>');
                    //echo ('<p> Date Publication: '.$ligne["DatePublicationT"].'</p>');
                    echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." height="200" style="width: 20rem;"</p>');
                    echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionT"].'</p>');  
                    echo ('<hr>');
                    if(isset($_SESSION['email'])){
                       echo ('<a href="MailTalent.php?t='.$ligne["TitreT"].'"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    } else {
                       echo ('<a href="Login.php"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    }   
                }   
                ?>     
            </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

        
    </body>
</html>

