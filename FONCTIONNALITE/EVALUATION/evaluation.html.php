<?php session_name('CHEMIN'); session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
    <link rel="stylesheet" type="text/css" href="etoile.css">
<body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>  
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
    <div class="jumbotron">
      <div class="container">
          <form method="POST" action="evaluation.fonction.php">
            <h1>Evaluer votre expérience</h1><hr>
            <fieldset>
              <legend>Notation :</legend>
               <rating>
                 <input type="radio" name="rating" value="1" aria-label="1 star" required/>
                 <input type="radio" name="rating" value="2" aria-label="2 stars"/>
                 <input type="radio" name="rating" value="3" aria-label="3 stars"/>
                 <input type="radio" name="rating" value="4" aria-label="4 stars"/>
                 <input type="radio" name="rating" value="5" aria-label="5 stars"/>
               </rating>
            </fieldset>
              <br>
            <fieldset>
              <legend>Votre avis nous intéresse :</legend>
               <rating>
                   <textarea name="avis" placeholder=""></textarea>
               <script src="etoile.js"></script>
               </rating>
            </fieldset>
              <br><p>Si votre besoin a été résolu, n'oubliez pas d'désactiver votre carte</p>
            <input type="reset" class="btn btn-dark">
            <input type="submit" class="btn btn-dark">
          </form>
      </div>
    </div>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>    
    </body>
</html>