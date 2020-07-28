<?php
        //header('Content-Type: text/html; charset=latin1_swedich_ci');
        
        // 2. Fonction vérification l'existnce d'email       
            
            function is_unique_login($session, $Email){
                session_name('CHEMIN');
                session_start();
                require_once $_SESSION["APPLICATION"].'/BDD/connexion.bdd.php'; 
                $bdd = connect();
                $requete = $bdd->query("SELECT Email from utilisateurs where Email = $Email");
                if(mysqli_stmt_fetch($requete)==TRUE){
                    return False;
                } else {
                    return True;
                }
            }
        

         
        // 4. Session actuelle : récuperer le code utilisateur   
            if (isset($_SESSION['email'])) {
                $sqlr = "select CodeU from utilisateurs WHERE Email = '{$_SESSION['email']}' ";
                $result = mysqli_query ($session, $sqlr);
                if ($code = mysqli_fetch_array($result)) {   
                    $usercode = $code['CodeU'];
                }   
            }
            
        // 5. récupérer le type d'info d'un utilisateur
            if (isset($_SESSION['email'])) {
                $query = "select TypeU from utilisateurs WHERE Email = '{$_SESSION['email']}' ";
                $result = mysqli_query ($session, $query);
                if ($type = mysqli_fetch_array($result)) {   
                    $_SESSION['type'] = $type['TypeU'];
                }  
            } 
     
         // 6. Tester si l'utilisateur est connecté avant saisir un nouveau besoin/talent
            function is_login_new_talent() {
                if (isset($_SESSION['email'])) {
                    echo ('<a href="Creer1Talent.php"><button type="button" class="btn btn-light">Créer un nouveau talent</button></a>');
                } else {
                    echo ('<a href="Login.php"><button type="button" class="btn btn-light">Créer un nouveau talent</button></a>');
                }
            }
            
                function is_login_new_besoin() {
                if (isset($_SESSION['email'])) {
                    echo ('<a href="Creer1Besoin.php"><button type="button" class="btn btn-light">Créer un nouveau besoin</button></a>');
                } else {
                    echo ('<a href="Login.php"><button type="button" class="btn btn-light">Créer un nouveau besoin</button></a>');
                }
            }

?>