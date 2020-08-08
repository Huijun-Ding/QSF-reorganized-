<?php session_name('CHEMIN'); session_start(); ?>
<!doctype html>
<html lang="fr">
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php';?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?> 
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
        <div class="jumbotron">
          <div class="container">
              <h1>Rédiger votre e-mail</h1>      
              <hr>
              <form action="besoinoui.fonction.php" method="POST">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Re: Répondre à votre besoin" disabled >
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="inputEmail4"><strong>Contenu du message</strong></label>
                    
                    <textarea name="contenu_besoin_oui">
                    Bonjour,
                    </textarea>
                <script>
                    var editor1 = CKEDITOR.replace('contenu_besoin_oui', {
                        extraAllowedContent: 'div',
                        height: 250
                      });
                </script>
                           
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                
          </div>
        </div>
        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>
  </body>
</html>