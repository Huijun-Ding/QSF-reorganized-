<?php session_start(); ?>
<!doctype html>
<html lang="fr">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
   <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">    
            <h1> Creer un besoin </h1>
            <form action="besoin.html.php" method="post">
            <?php
            //require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/BESOIN/besoin.fonction.php'; 
            date_default_timezone_set('Europe/Paris');
            echo "Date de création :   " . date("d/m/yy");   // Afficher le jour de la création 
            ?>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                  <select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect" required>
                        <option value="" selected>Choisir une catégorie</option>
                        <option value="1" name="categorie" title="...">Sport</option>
                        <option value="2" name="categorie" title="Réunions créatives/Pitcher .....">Animation</option>
                        <option value="3" name="categorie"title="...">Outils métiers</option>
                        <option value="4" name="categorie" title="Yoga, méditation...">Développement personnel</option>
                        <option value="5" name="categorie" title="...">Associatif</option>
                        <option value="6" name="categorie" title="...">Covoiturage</option>
                        <option value="7" name="categorie" title="Word, Excel, PowerPoint, Outlook...">Bureautique</option>
                        <option value="8" name="categorie" title="Internet, site Web, réparation PC...">Informatique</option>
                        <option value="9" name="categorie" title="Cuisine, bricolage, musique, théâtre, ciné, culture, philatélie, généalogie...">Loisir </option>
                        <option value="10" name="categorie" title="Demande de créér une catégorie à l'administrateur">Autres </option>
                  </select>
                </div><p>(<span style="color:red">*</span>)</p>
            </div>
            <div class="form-group">
              <label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>
              <input type="text" name="titre" class="form-control col-md-4" id="inputEmail4" maxlength="20" required>
            </div>
            <div class="form-group">
                    <label for="inputEmail4">Déscription du besoin(<span style="color:red">*</span>)</label><br/>
                    <textarea rows="4" cols="50" name="description" placeholder=" Veuillez préciser votre besoin" required></textarea>
            </div>
            <div class="form-group">
              <label for="inputEmail4">Date butoire(<span style="color:red">*</span>)</label>
              <input type="date" name="datebutoire" class="form-control col-md-4" id="inputEmail4" maxlength="10" required>
            </div>
            <div class="form-group">
                  <label for="inputAddress">Type de besoin(<span style="color:red">*</span>)</label>				
            </div>
            <div class="form-group" >
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="inlineRadio1" required value="Pro">
                <label class="form-check-label" for="inlineRadio1">Pro</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">
                <label class="form-check-label" for="inlineRadio2">Perso</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">
                <label class="form-check-label" for="inlineRadio3">Pro&Perso</label>
              </div>               
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark">CREER</button>
            </div>
            </form>   
          </div>
        </div>  
        
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

  </body>
</html>



