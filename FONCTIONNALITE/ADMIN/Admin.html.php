<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
<body>  
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>  
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
               <link rel="stylesheet" type="text/css" href="admin.css">     <!-- css pour les onglets --> 
               <script src="admin.js"></script>                             <!-- js pour les onglets --> 
              
               <h1>Admin</h1>        <!-- Bouton pour les onglets --> 
                <button class="tablink" onclick="openPage('Catégories', this, 'orange')" id="defaultOpen">Catégories</button>   <!-- moteur de recherche : après changer de page ?????-->   
                <button class="tablink" onclick="openPage('Cartes', this, 'orange')" >Cartes</button>
                <button class="tablink" onclick="openPage('Utilisateurs', this, 'orange')" >Utilisateurs</button>
                <button class="tablink" onclick="openPage('Stats', this, 'orange')">Statistiques</button>
                <button class="tablink" onclick="openPage('Bandeau', this, 'orange')" >Bandeau</button>
                <button class="tablink" onclick="openPage('Paramètres', this, 'orange')">Paramètres</button>
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
                <div id="Catégories" class="tabcontent">    <!-- Onglet catégorie --> 
                  <h3>Catégories</h3><hr>
                    
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">⊕ Créer </button><br><br>
                    
                  <form action="AdminCategorie.fonction.php" method="POST">  <!--Créer une nouvelle catégorie --> 
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nouvelle catégorie</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">            
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Nom de catégorie :</label>
                              <input name="nomc" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Description de catégorie :</label>
                              <textarea name="descriptionc" class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Photo de catégorie :</label>  <!-- url de l'image ? -->
                              <textarea name="photoc" class="form-control" id="message-text"></textarea>
                            </div>                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button name="creer" type="submit" class="btn btn-primary">Créer</button>
                        </div>                     
                      </div>
                    </div>
                  </div>
                  </form>
                  
                   <?php
                    require_once('Fonctions.php');

                    $query = "select CodeC, NomC, DescriptionC, PhotoC, VisibiliteC from categories";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">PhotoC</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) { 
                        if ($ligne["VisibiliteC"] == 1){
                            echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeC"].'</th>');
                            echo ('<td>'.$ligne["NomC"].'</td>');
                            echo ('<td>'.$ligne["DescriptionC"].'</td>');                       
                            echo ('<td><img src="'.$ligne["PhotoC"].'" alt="'.$ligne["NomC"].'" width="100" height="90"></td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');  //Modifier une catégorie
                             echo ('<a href="AdminCategorieModification.php?t='.$ligne["CodeC"].'"><button type="button" class="btn btn-secondary"><img src="https://png.pngtree.com/png-vector/20190927/ourlarge/pngtree-pencil-icon-png-image_1753753.jpg" alt="Modifier" width="30" height="30"></button></a>');
                             echo ('<form action="AdminCategorie.fonction.php" method="POST">');  //Désactiver une catégorie
                             echo ('<button name="desactiver" value="'.$ligne["CodeC"].'" type="submit" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Supprimer" width="30" height="30"></button>');
                             echo ('</form>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    }
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>                        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Cartes" class="tabcontent">      <!-- Onglet carte --> 
                
                  <h3>Cartes</h3><hr>  
           
                  <!-- Tab links -->
                    <div class="tab">
                      <button class="tablinksc" onclick="openCity(event, 'London')" id="defaultOpenc">Besoins</button>
                      <button class="tablinksc" onclick="openCity(event, 'Paris')">Talents</button>
                    </div>

                    <!-- Tab content -->
                    <div id="London" class="tabcontentc">
                    <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                        <h3>Besoins</h3>
                        <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">     <!-- Moteur de recherche dans titre & description -->
                            <input class="form-control mr-sm-2" type="search" name="carteb" placeholder="Titre/Description" aria-label="Recherche">
                            <button type="submit" class="btn btn-outline-dark">Recherche</button>
                        </form>
                    </div>
                  <form action="AdminCarteInapproprieB.fonction.php" method="post">
                  <?php
                   
                    $query = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 1 order by CodeB DESC";

                    if(isset($_GET['carteb']) AND !empty($_GET['carteb'])) {     /*Recherche par mot clé dans le titre et description*/
                        $carteb = htmlspecialchars($_GET['carteb']);
                        $query = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 1 and ( TitreB LIKE '%$carteb%' or DescriptionB LIKE '%$carteb%' ) order by CodeB DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                 
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les besoins existants*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeB"].'</th>');                         
                            echo ('<td>'.$ligne["TitreB"].'</td>');                           
                            echo ('<td>'.$ligne["DescriptionB"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminBesoinX.html.php?t='.$ligne["CodeB"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="desactiverb" value="'.$ligne["CodeB"].'" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');                            
                             echo ('</div>');
                            echo ('</td>');                        
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                    
                    echo('<br><h3>Besoins Cachés</h3><br>');   

                    $query2 = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 0 order by CodeB DESC";

                    if(isset($_GET['carteb']) AND !empty($_GET['carteb'])) {     /*Recherche par mot clé dans le titre et description*/
                        $carteb = htmlspecialchars($_GET['carteb']);
                        $query2 = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 0 and ( TitreB LIKE '%$carteb%' or DescriptionB LIKE '%$carteb%' ) order by CodeB DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query2);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les besoins cachés */       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeB"].'</th>');
                            echo ('<td>'.$ligne["TitreB"].'</td>');
                            echo ('<td>'.$ligne["DescriptionB"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminBesoinX.html.php?t='.$ligne["CodeB"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activerb" value="'.$ligne["CodeB"].'" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                                                       
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    ?>        
                </form>
                </div>

                <div id="Paris" class="tabcontentc">      
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Talents</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                        <input class="form-control mr-sm-2" type="search" name="carteb" placeholder="Titre/Description" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                </div>
                    
                  <form action="AdminCarteInapproprieT.fonction.php" method="post">
                  <?php

                    $query = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 1 order by CodeT DESC";

                    if(isset($_GET['cartet']) AND !empty($_GET['cartet'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartet']);
                        $query = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 1 and ( TitreT LIKE '%$cartet%' or DescriptionT LIKE '%$cartet%' ) order by CodeT DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeT"].'</th>');
                            echo ('<td>'.$ligne["TitreT"].'</td>');
                            echo ('<td>'.$ligne["DescriptionT"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminTalentX.html.php?t='.$ligne["CodeT"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                              echo ('<button type="submit" name="desactivert" value="'.$ligne["CodeT"].'" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');                 
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    echo('<br><h3>Talents Cachés</h3><br>');
                    
                    $query2 = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 0 order by CodeT DESC";

                    if(isset($_GET['cartet']) AND !empty($_GET['cartet'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartet']);
                        $query2 = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 0 and ( TitreT LIKE '%$cartet%' or DescriptionT LIKE '%$cartet%' ) order by CodeT DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query2);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents cachés*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeT"].'</th>');
                            echo ('<td>'.$ligne["TitreT"].'</td>');
                            echo ('<td>'.$ligne["DescriptionT"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminTalentX.html.php?t='.$ligne["CodeT"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activert" value="'.$ligne["CodeT"].'" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                    
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                    ?>        
                </form>
            </div>




            </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Utilisateurs" class="tabcontent">      <!-- Onglet utilisateur --> 
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                      <h3>Utilisateurs</h3><hr>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">  <!-- Moteur de recherche --> 
                        <input class="form-control mr-sm-2" type="search" name="user" placeholder="Nom/Prénom/Email" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                  <p>Accéder au profil d'utilisateur. Bloquer un compte avec un mail de prévenance (modal : êtes-vous sûr ? comme ne pouvoir pas réactiver un compte). Moteur de recherche dans nom, prénom, email</p>
                  <form name="Supprimer" action="AdminUtilisateur.fonction.php" method="post">
                   <?php

                    $query = "select CodeU, NomU, PrenomU, Email from utilisateurs where NomU <> 'XXXXX' order by CodeU DESC";
                    
                    if(isset($_GET['user']) AND !empty($_GET['user'])) {     /*Recherche par mot clé dans prénom, nom, email des utilisateurs*/
                        $user = htmlspecialchars($_GET['user']);
                        $query = "select CodeU, NomU, PrenomU, Email from utilisateurs where NomU <> 'XXXXX' and ( NomU LIKE '%$user%' or PrenomU LIKE '%$user%' or Email LIKE '%$user%' ) order by CodeU DESC";
                    }

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Prénom</th>');
                            echo ('<th scope="col">Email</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                            echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeU"].'</th>');
                            echo ('<td>'.$ligne["NomU"].'</td>');
                            echo ('<td>'.$ligne["PrenomU"].'</td>');
                            echo ('<td>'.$ligne["Email"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminUtilisateur.html.php?t='.$ligne["CodeU"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');                 
                             echo ('<button type="button"  class="btn btn-secondary" data-toggle="modal" data-target="#supprimer'.$ligne["CodeU"].'"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');    
                             echo ('</div>');
                            echo ('</td>');
                            echo ('</tr>');              
            
                             echo('<div class="modal" tabindex="-1" id="supprimer'.$ligne["CodeU"].'" role="dialog">');
                                echo('<div class="modal-dialog" role="document">');
                                  echo('<div class="modal-content">');
                                    echo('<div class="modal-header">');
                                      echo('<h5 class="modal-title">Vérification</h5>');
                                      echo('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');
                                        echo('<span aria-hidden="true">&times;</span>');
                                      echo('</button>');
                                    echo('</div>');
                                    echo('<div class="modal-body">');
                                      echo('<p>Êtes-Vous sûr de supprimer ce compte ?  </p>');
                                    echo('</div>');
                                    echo('<div class="modal-footer">');                               
                                      echo('<button name="codeu" value="'.$ligne["CodeU"].'" type="submit" class="btn btn-primary">Supprimer</button>');
                                      echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>');
                                    echo('</div>');
                                  echo('</div>');
                                echo('</div>');
                              echo('</div>');         
         
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>        
                   </form>
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
            <div id="Stats" class="tabcontent">
              <h3>Statistiques</h3><hr>   
              
              <h5>Nombre de connexion du site</h5>
              <a href="https://analytics.google.com/analytics/web/?authuser=1#/report/visitors-overview/a173955301w241368476p225152034/" class="btn btn-light">Aller voir sur Google Analytics</a>
              <p><br></p>
              
              <h5>Mise en relation</h5><hr>
              <?php
                require_once('Fonctions.php');
                echo ('<dl>');
                echo ('<dt>Nombre de mise en relation besoins : ');
                $query5 = "select count(*) as reussit from compteurb";
                $result5 = mysqli_query ($session, $query5);
                if ($note = mysqli_fetch_array($result5)) {   
                    echo $note["reussit"]; 
                }                   
                echo ('</dt>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation réussit : ');
                $query1 = "select count(*) as reussit from compteurb where NumOuiB = 1";
                $result1 = mysqli_query ($session, $query1);
                if ($note = mysqli_fetch_array($result1)) {   
                    echo $note["reussit"]; 
                }
                echo ('</dd>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation échoué : ');
                $query2 = "select count(*) as echoue from compteurb where NumNonB = 1";
                $result2 = mysqli_query ($session, $query2);
                if ($note = mysqli_fetch_array($result2)) {   
                    echo $note["echoue"]; 
                }                   
                echo ('</dd>');
                echo ('</dl>');  

                echo ('<dl>');
                echo ('<dt>Nombre de mise en relation talents : ');
                $query6 = "select count(*) as reussit from compteurt";
                $result6 = mysqli_query ($session, $query6);
                if ($note = mysqli_fetch_array($result6)) {   
                    echo $note["reussit"]; 
                }                    
                echo ('</dt>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation réussit : ');
                $query3 = "select count(*) as reussit from compteurt where NumOuiT = 1";
                $result3 = mysqli_query ($session, $query3);
                if ($note = mysqli_fetch_array($result3)) {   
                    echo $note["reussit"]; 
                }                    
                echo ('</dd>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation échoué : ');
                $query4 = "select count(*) as echoue from compteurt where NumNonT = 1";
                $result4 = mysqli_query ($session, $query4);
                if ($note = mysqli_fetch_array($result4)) {   
                    echo $note["echoue"]; 
                }                    
                echo ('</dd>');
                echo ('</dl>');                                    

                echo ('<br><h5>Retour d\'expérience</h5><hr>');
                echo ('<p>Moyenne de notes : ');
                $moyenne = "select AVG(Note) as moyenne from evaluation";
                $notemoyenne = mysqli_query ($session, $moyenne);
                if ($note = mysqli_fetch_array($notemoyenne)) {   
                    echo $note["moyenne"];
                    echo ('</p>'); 
                }

                echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                echo ('<thead>');
                      echo ('<tr>');
                        echo ('<th scope="col">Note</th>');
                        echo ('<th scope="col">Commentaire</th>');
                      echo ('</tr>');
                    echo ('</thead>');
                    echo ('<tbody>');
                $query = "select Note, Avis from evaluation where Avis != '' order by CodeE DESC limit 20";
                $result = mysqli_query ($session, $query);                        
                if (mysqli_num_rows($result)>0) {
                while ($ligne = mysqli_fetch_array($result)) {                                               
                      echo ('<tr>');
                        echo ('<th scope="row">'.$ligne["Note"].'</th>');
                        echo ('<td>'.$ligne["Avis"].'</td>');
                      echo ('</tr>');                     
                }          
                } 
                 echo ('</tbody>');
                echo ('</table>');                    

              ?>
            </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->                  
        <div id="Bandeau" class="tabcontent">
            <h3>Bandeau</h3><hr>
            <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/ACCUEIL/slide.html.php'; ?>
        <br>  
        <h4>Modification</h4><hr>
        
        <form method="POST" action="AdminBandeau.fonction.php">           
            <h5>Premier slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Paragraphe 1</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_1"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Paragraphe 2</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_2"></textarea>
                </div><br>           
            <!--<h5>Deuxième slide</h5><br>-->
            <h5>Troisième slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nouvelle</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide3"></textarea>
                </div><br>
            <h5>Quatième slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Utilisateur 1</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_1"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Utilisateur 2</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_2"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Utilisateur 3</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_3"></textarea>
                </div><br>           
            <input type="submit" class="btn btn-dark" value="Modifier">
        </form>        
        </div>  
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
            <div id="Paramètres" class="tabcontent">
                <h3>Paramètres</h3><hr>
              <p>Paramétrer le délais d'envoie de mail d’évaluation : <input type='text' placeholder="15"> jours </p>
              <button type="button" class="btn btn-dark"> Changer </button>
            </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------> 
      </div>
    </div>

    <hr> 
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>    
</body>
</html>