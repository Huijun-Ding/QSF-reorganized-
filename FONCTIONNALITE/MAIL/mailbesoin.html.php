<?php session_start(); ?>
<!doctype html>
<html lang="en">
 <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
     <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
       
      
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
              <h1>Rédiger votre e-mail</h1>      
              <hr>
              <form action="" method="POST">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>De</strong></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php require_once('Fonctions.php'); echo $_SESSION['email']; ?>" disabled >
                  </div>
                </div>
                 
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php 
                        $T = $_GET['t'];
                        echo '[Quai des savoir-faire] Répondre à votre besoin '.$T.''; 
                        ?>" disabled >
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="inputEmail4"><strong>Contenu du message</strong></label>
                   
                    <textarea name="email">
                        <?php  
                        echo '<pre>';
                        echo 'Bonjour,';
                        echo '                                                                                                                                                       ';
                        echo 'Je vous contacte pour répondre à votre besoin '.$T.'. ';
                        echo '</pre>';
                        ?>                 
                    </textarea>
                    
                <script>
                        CKEDITOR.replace( 'email' );
                </script>
                
                <?php 
                    //$destinataire = ""; // adresse mail du destinataire
                    //$sujet = "Réponse à votre besoin"; // sujet du mail
                    //$message = "?"; // message qui dira que le destinataire a bien lu votre mail
                    // maintenant, l'en-tête du mail
                    //$header = "From: [Quai des savoir-faire]\r\n"; 
                    //$header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                    //mail ($destinataire, $sujet, $message, $header); // on envois le mail    
                ?>
                
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
          </div>
        </div>

        <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/footer.php'; ?>

   
  </body>
</html>