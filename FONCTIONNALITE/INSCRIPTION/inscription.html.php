<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/header.php'; ?>
  <body>
    <?php require_once $_SESSION["APPLICATION"].'/FONCTIONNALITE/nav.php'; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="jumbotron">
          <div class="container">
			
			<h1> CREER UN COMPTE </h1>
			
                        <form method = 'POST' action="AjouterUtilisateurs.php">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputEmail4">Nom</label>
				  <input type="text" class="form-control" name="nom" id="inputEmail4" maxlength="40" required>
				</div>
				<div class="form-group col-md-6">
				  <label for="inputPassword4" >Prénom</label>
				  <input type="text" class="form-control" name="prenom" id="inputPassword4" maxlength="25" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputAddress">Email (Perso)</label>
				<input type="text" class="form-control" name="email" id="inputAddress" placeholder="@gmail.com" maxlength="255" required>
			  </div>
                        
			  <div class="form-group">
				<div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck" required="">
				  <label class="form-check-label" for="gridCheck">
                                      <a href="ConditionGeneraleUtilisation.php" class="bulle">Je m'engage à respecter <u>la charte</u>.<span> Toutes vos échanges sur Quai des savoir-faire sont en anonyme, si vous voulez en savoir plus, vuillez cliquer ici</span> </a>
				  </label>
				</div>
			  </div>
                          
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputPassword1">Mot de Passe</label>
				  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" maxlength="40" required>
				</div>                       
				<div class="form-group col-md-6">
				  <label for="inputPassword4">Confirmation de Mot de Passe </label>
				  <input type="password" class="form-control" name="passwordcf" id="exampleInputPassword1"  placeholder="Password Confirmation" maxlength="40" required>
				</div>
			  </div>
                            
                        <div id="radiotypeu">
                          <p>Sélectionner le type d'information affichée</p> 
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Pro et Perso
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios2" value="Pro">
                            <label class="form-check-label" for="exampleRadios2">
                              Pro
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios3" value="Perso">
                            <label class="form-check-label" for="exampleRadios3">
                              Perso
                            </label>
                          </div>
                            <br>
                        </div>
                            
                        <div class="form-group">
                              <button type="submit" class="btn btn-dark">S'inscrire</button>
                        </div>
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


