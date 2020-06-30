<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">	
            <h1> Ajouter un talent </h1>
            <form action="Saisir1Talent.php" method="post">
            <?php
            require_once('Fonctions.php');
            date_default_timezone_set('Europe/Paris');
            echo "Date de création : " . date("yy/m/d"); 
            ?>
            <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                      <select class="custom-select mr-sm-2" name="categorieT" id="inlineFormCustomSelect" required>
                            <option value="" selected>Choisir une catégorie</option>
                            <option value="1" name="categorieT" title="...">Sport</option>
                            <option value="2" name="categorieT" title="Réunions créatives/Pitcher .....">Animation</option>
                            <option value="3" name="categorieT" title="...">Outils métiers</option>
                            <option value="4" name="categorieT" title="Yoga, méditation...">Développement personnel</option>
                            <option value="5" name="categorieT" title="...">Associatif</option>
                            <option value="6" name="categorieT" title="...">Covoiturage</option>
                            <option value="7" name="categorieT" title="Word, Excel, PowerPoint, Outlook...">Bureautique</option>
                            <option value="8" name="categorieT" title="Internet, site Web, réparation PC...">Informatique</option>
                            <option value="9" name="categorieT" title="Cuisine, bricolage, musique, théâtre, ciné, culture, philatélie, généalogie...">Loisir </option>
                            <option value="10" name="categorieT" title="Demande de créér une catégorie à l'administrateur">Autres </option>
                      </select>
                    </div> <p>(<span style="color:red">*</span>)</p>
            </div>
            <div class="form-group">
              <label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>
              <input type="text" name="titreT" class="form-control col-md-4" id="inputEmail4" maxlength="20" required>
            </div>
            <div class="form-group">
                    <label for="inputEmail4">Déscription du talent(<span style="color:red">*</span>)</label><br/>
                    <textarea rows="4" cols="50" name="descriptionT" placeholder=" Veuillez préciser votre talent" required></textarea>
            </div>
            <div class="form-group">
                    <label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>				
            </div>
                
            <div class="form-group">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typeT" id="inlineRadio1" required value="Pro">
                <label class="form-check-label" for="inlineRadio1">Pro</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio2" value="Perso">
                <label class="form-check-label" for="inlineRadio2">Perso</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio3" value="Pro et Perso">
                <label class="form-check-label" for="inlineRadio3">Pro&Perso</label>
              </div>               
            </div>

              <div class="form-group">
              <button type="submit" class="btn btn-dark">Créer</button>
              </div>
            </form>
          </div>
        </div>
        
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
    
  </body>
</html>
