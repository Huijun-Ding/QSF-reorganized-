<?php

    if(isset($_POST['seconnecter'])){
        if(isset($_POST['email'])){
            session_name('CHEMIN');
            session_start();

            require_once $_SESSION["APPLICATION"].'/BDD/connexion.bdd.php'; 
            $bdd = connect();

            $Email = $_POST['email'];
            $Password = $_POST["password"];

            $requete = $bdd->query("SELECT MotDePasse FROM utilisateurs WHERE Email= '$Email'");

            $resultat = $requete ->fetch($good_password);
            //comment traduire 
            //mysqli_stmt_bind_result($stmt, $good_password);
            //mysqli_stmt_fetch($stmt);
 

            if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session ???

                session_name('UTILISATEUR');
                session_start();

                    $_SESSION['email'] = $Email;
                    $_SESSION['password'] = $Password;

                header('Location: '.$_SESSION['APPLICATION'].'/FONCTIONNALITE/ACCUEIL/index.php');

                // Envoyer un mail, mais on ne peut pas tester en utilisant un serveur local

                $destinataire = "$Email"; // adresse mail du destinataire
                $sujet = "Confirmation de la création de compte"; // sujet du mail
                $message = "Vous venez de créer un compte"; // message qui dira que le destinataire a bien lu votre mail
                // maintenant, l'en-tête du mail
                $header = "From: [Quai des savoir-faire]\r\n"; 
                $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
                $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                mail ($destinataire, $sujet, $message, $header); // on envois le mail            
                } else {
                      ?>
                <script type="text/javascript">
                    alert("Mauvais Email / mot de passe ! \n Veuillez réessayer. ");
                    //document.location.href = 'connexion.html.php';
                </script>
                <?php
                }       
        }
    }

    if(isset($_POST['sinscrire'])){
        
        
        
        
        
        
        
        
        
        
        
        
    }




?>

