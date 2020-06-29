<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
              <form class="form-signin" method = 'POST' action="IdentificationUtilisateur.php">

                  <center>
                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    <label for="inputEmail" class="sr-only" >Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Votre adresse mail" required autofocus style="width:40%">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Votre mot de passe" required style="width:40%">
                    <div class="checkbox mb-3">
                            <label>
                              <input type="checkbox" value="remember-me"> Remember me
                              <p> <a href="Inscription.php" target="_blank"> S'inscrire <a> </p>
                            </label>
                    </div>
		    <button class="btn btn-lg btn-dark btn-block" type="submit" style="width:40%">Se connecter</button>
                  </center>
              </form>

          </div>
        </div>
          <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNAILITE/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

