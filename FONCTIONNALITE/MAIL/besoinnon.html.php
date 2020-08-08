<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php';?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>  
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
        <div class="jumbotron">
          <div class="container">
              <h1>Pourquoi ?</h1><hr>
              <p>Veuillez sélectionner une raison de refuse : </p><br>
              <form action="besoinnon.fonction.php" method="GET">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="raison_non_besoin" id="besoin_raison1" value="Mon besoin a été résolu" checked>
                  <label class="form-check-label" for="besoin_raison1">
                    Mon besoin a été répondu
                  </label>
                </div><br>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="raison_non_besoin" id="besoin_raison2" value="Je ne suis pas libre">
                  <label class="form-check-label" for="besoin_raison2">
                    Je ne suis pas libre
                  </label>
                </div><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="raison_non_besoin" id="besoin_raison3" value="">
                  <label class="form-check-label" for="besoin_raison3">
                    Autre raison (veuillez préciser)  
                  </label><br>
                  <textarea name="autre_raison" rows="4" cols="50"></textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </form>
              <hr>      
          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
  </body>
</html>
