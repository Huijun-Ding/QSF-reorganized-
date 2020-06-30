<?php session_start(); ?>
<!doctype html>
<html lang="en">
<?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
<body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container" id="MesInfos">
           
            <h1>Mes informations personnelles</h1>
            <hr>

            <div class="row">
                <div class="col-8">

                    <?php
                    require_once('Fonctions.php');

                    $query = " select NomU, PrenomU, Email, TypeU from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($info = mysqli_fetch_array($result)) {                     
                        echo ('<p>Nom : '.$info["NomU"].'</p>');          
                        echo ('<p>Prénom : '.$info["PrenomU"].'</p>');  
                        echo ('<p>Adresse mail : '.$info["Email"].'</p>');  
                    } ?>
                </div>
                <div class="col-4">
                    <form name="Supprimer" action="Supprimer1Compte.php" method="post"><br>
                        
                    <?php
                    echo('<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#supprimer">Supprimer mon compte</button>');
                    
                    echo('<div class="modal" tabindex="-1" id="supprimer" role="dialog">');
                        echo('<div class="modal-dialog" role="document">');
                          echo('<div class="modal-content">');
                            echo('<div class="modal-header">');
                              echo('<h5 class="modal-title">Vérification</h5>');
                              echo('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');
                                echo('<span aria-hidden="true">&times;</span>');
                              echo('</button>');
                            echo('</div>');
                            echo('<div class="modal-body">');
                              echo('<p>Êtes-Vous sûr de supprimer votre compte ? </p>');
                            echo('</div>');
                            echo('<div class="modal-footer">');
                              echo('<button type="submit" class="btn btn-primary">Supprimer</button>');
                              echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>');
                            echo('</div>');
                          echo('</div>');
                        echo('</div>');
                      echo('</div>');                
                    ?>         
                    </form>
                </div>
            </div>

                <form method="POST" action="monespace.fonction.php">
                   <?php 
                    echo ('<p>Type d\'information affichée : </p>'); 
                    if ($_SESSION['type'] == NULL){
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" checked/>');
                        echo ('<label for="radio-three">Pro et Perso</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');
                    } elseif ($_SESSION['type'] == 'Pro') {
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" />');
                        echo ('<label for="radio-three">Pro et Perso</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" checked />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');
                    } elseif ($_SESSION['type'] == 'Perso') {
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" />');
                        echo ('<label for="radio-three">Pro et Perso</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" checked />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');                 
                    }
                    ?>
                    <br>
                    <button type="submit" onclick="Modifier()" class="btn btn-outline-dark">Modifier le type d'information affichée</button>
                    <script>
                        function Modifier() {
                            alert("Modification réussite !");
                            }
                    </script>                  
                </form>
            </div>
          </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->           
           <div class="container" id="MesBesoins">
           
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1> Mes besoins </h1>
              <?php is_login_new_besoin(); ?>
            </div>
            <hr>
  
            <form method="POST" action="Desactiver1CarteB.php">
                <div class="row">
                <div class="col-10">
                <ul class="list-inline">
            <?php
            require_once('Fonctions.php');

            $query = " select b.VisibiliteB, b.CodeB, b.TitreB, b.DescriptionB, b.DatePublicationB, b.DateButoireB, c.PhotoC from categories c, besoins b, saisir s where s.CodeB = b.CodeB and c.CodeC = b.CodeC and s.CodeU = {$usercode} order by b.CodeB DESC ";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
         
            if (mysqli_num_rows($result)>0) {
                 while ($besoin = mysqli_fetch_array($result)) {            
                    if (strtotime($besoin["DateButoireB"]) > strtotime(date("yy/m/d")) && $besoin["VisibiliteB"] == 1) {  
                        echo ('<li class="list-inline-item"><div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');
                        echo ('<center><input type="radio" name="codeB" value="'.$besoin["CodeB"].'"/><center>');
                        echo ('</div>');
                        echo ('<img src="'.$besoin["PhotoC"].'" class="card-img-top" alt="...">');   
                        echo ('<div class="card-body card text-center">');
                        echo ('<h5 class="card-title">'.$besoin["TitreB"].'</h5>');
                        echo ('<p class="card-text">Date de publication: '.$besoin["DatePublicationB"].'</p>');
                        echo ('<p class="card-text">Délais souhaité: '.$besoin["DateButoireB"].'</p>');
                        echo ('<a href="BesoinX.php?t='.$besoin["CodeB"].'" class="btn btn-outline-dark">Voir la demande</a>'); 
                        echo ('<br>');
                        echo ('<a href="BesoinModification.php?t='.$besoin["TitreB"].'" class="btn btn-outline-dark">Modifier mon besoin</a>'); 
                        echo ('</div>');  
                        echo ('</div></li>');       
                       }
                } 
            } else {
                    echo ("Vous n'avez pas encore saisi un besoin");
            }             
  
            ?>
                </ul>
                     </div>
                <div class="col-2">
                     <!-- Button trigger modal -->
                     <button  type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#MyModal">Désactiver carte</button>

                     <!-- Modal -->
                    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vérification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                              <span aria-hidden="true">&times;</span> 
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Êtes-Vous sûr de désactiver cette carte ?</p>
                          </div>
                          <div class="modal-footer">
                            <button name="desactiverB" type="submit" class="btn btn-primary">Désactiver</button>  
                          </div>
                        </div>
                      </div>
                    </div>

                </div>          
            </div>
            </form>   
          </div>  
       
        <br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="container" id="MesTalents">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Mes talents </h1>
                <?php is_login_new_talent(); ?>
            </div>
            
            <hr>
           
            <form method="POST" action="Desactiver1CarteT.php">
              <div class="row">
              <div class="col-10">
              <ul class="list-inline">
            <?php
            require_once('Fonctions.php');

            $query = " select t.VisibiliteT, t.CodeT, t.TitreT, t.DatePublicationT, c.PhotoC from categories c, talents t, proposer p where p.CodeT = t.CodeT and c.CodeC = t.CodeC and p.CodeU = {$usercode} order by t.CodeT DESC";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
             
            
            if (mysqli_num_rows($result)>0) {
                    while ($talent = mysqli_fetch_array($result)) {                     
                         if ($talent["VisibiliteT"] == 1) {  
                            echo ('<li class="list-inline-item"><div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input type="radio" name="codeT" value="'.$talent["CodeT"].'"/><center>');
                            echo ('</div>');
                            echo ('<img src="'.$talent["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$talent["TitreT"].'</h5>');
                            echo ('<p class="card-text">Date de publication: '.$talent["DatePublicationT"].'</p>');        
                            echo ('<a href="TalentX.php?t='.$talent["CodeT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                            echo ('<br>');
                            echo ('<a href="TalentModification.php?t='.$talent["TitreT"].'" class="btn btn-outline-dark">Modifier mon talent</a>'); 
                            echo ('</div>');  
                            echo ('</div></li>');                
                          } 
                    }
            } else {
                    echo ("Vous n'avez pas encore saisi un talent");
            }             
 
            ?>
             </ul>     
                   </div>
                   <div class="col-2">
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#MyModalT">Désactiver carte</button>
                    
                     <!-- Modal -->
                    <div class="modal fade" id="MyModalT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vérification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                              <span aria-hidden="true">&times;</span> 
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Êtes-Vous sûr de désactiver cette carte ?</p>
                          </div>
                          <div class="modal-footer">
                            <button name="desactiverT" type="submit" class="btn btn-primary">Désactiver</button>  
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>          
            </div>           
            </form>        
          </div>
       </div> 
  <hr> 
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

  
</body>
</html>