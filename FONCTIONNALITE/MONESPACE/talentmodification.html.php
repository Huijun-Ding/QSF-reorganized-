<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?> 
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
        <div class="jumbotron">
          <div class="container">
              <h1>Modifiez votre talent</h1>      
              <hr>
              <form action="Modifier1CarteT.php" method="POST">
               <?php
                require_once('Fonctions.php');
                date_default_timezone_set('Europe/Paris');
                echo "Date de modification :   " . date("d/m/yy"); 
               ?>         
               <?php

                $T = $_GET['t'];
                $query = "select t.TypeT, t.CodeT, t.VisibiliteT, t.TitreT, c.CodeC, c.NomC, t.DatePublicationT, t.DescriptionT from talents t, categories c where t.CodeC = c.CodeC and t.CodeT = $T ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if ($ligne["VisibiliteT"] == 1) {   
          
                        
                        echo('<div class="form-row align-items-center">');
                    echo('<div class="col-auto my-1">');
                      echo('<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>');
                      echo('<select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect" required>');
                            echo('<option value="'.$ligne["CodeC"].'" name="categorie" selected>'.$ligne["NomC"].'</option>');
                            echo('<option value="1" name="categorie" title="...">Sport</option>');
                            echo('<option value="2" name="categorie" title="Réunions créatives/Pitcher .....">Animation</option>');
                            echo('<option value="3" name="categorie"title="...">Outils métiers</option>');
                            echo('<option value="4" name="categorie" title="Yoga, méditation...">Développement personnel</option>');
                            echo('<option value="5" name="categorie" title="...">Associatif</option>');
                            echo('<option value="6" name="categorie" title="...">Covoiturage</option>');
                            echo('<option value="7" name="categorie" title="Word, Excel, PowerPoint, Outlook...">Bureautique</option>');
                            echo('<option value="8" name="categorie" title="Internet, site Web, réparation PC...">Informatique</option>');
                            echo('<option value="9" name="categorie" title="Cuisine, bricolage, musique, théâtre, ciné, culture, philatélie, généalogie...">Loisir </option>');
                            echo ('<option value="10" name="categorie" title="Demande de créér une catégorie à l\'administrateur" >Autres </option>');
                      echo('</select>');
                    echo('</div>');
                    echo('</div>');
               
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="titre" class="form-control col-md-4" id="inputEmail4" maxlength="20" value="'.$ligne["TitreT"].'" required>');
                        echo ('</div>');
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">Déscription du besoin(<span style="color:red">*</span>)</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="description" required>'.$ligne["DescriptionT"].'</textarea>') ;
                        echo('</div>') ;
            
                          if ($ligne["TypeT"] == "Pro") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" checked type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
                        
                         if ($ligne["TypeT"] == "Perso") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input"  checked type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
 
                        
                        if ($ligne["TypeT"] == "Pro et Perso") {
                          echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" checked name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                           }

                        echo('<hr>');
                        echo('<div class="form-group">');
                        echo('<button name="codeT" type="submit" value="'.$ligne["CodeT"].'" class="btn btn-dark btn-lg">MODIFIER </button>');
                        echo('</div>');
                              }
                }
                 ?> 
              </form>

          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>   
  </body>
</html>