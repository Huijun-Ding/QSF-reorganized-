<?php

    //require_once $_SESSION["APPLICATION"].'/BDD/utilisateur.bdd.php';

    if(isset($_POST['seconnecter'])){   //Un utilisateur qui se connecte
        if(isset($_POST['email'])){
            //session_name('CHEMIN');
            session_start();
            require_once $_SESSION["APPLICATION"].'/BDD/connexion.bdd.php'; 
            $bdd = connect();
            
            $requete = $bdd->query("SELECT MotDePasse FROM utilisateurs WHERE Email= '{$_POST['email']}'");

            //$requete->bindParam('MotDePasse', $good_password);
            
             while ($resultat = $requete ->fetch()) {
                  if(password_verify($_POST["password"],$resultat["MotDePasse"])) {    // si le mot de passe est bon, ouvert la session ???

                //session_name('UTILISATEUR');
                session_start();

                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['password'] = $_POST["password"];

                header('Location: '.$_SESSION['APPLICATION'].'/FONCTIONNALITE/ACCUEIL/index.php');
            } else {
                      ?>
                <script type="text/javascript">
                    alert("Mauvais Email / mot de passe ! \n Veuillez réessayer. ");
                    document.location.href = 'connexion.html.php';
                </script>
                <?php
            }    
             }

        }
        }
    

    if(isset($_POST['sinscrire'])){   //Ajouter un nouveau utilisateur dans la base de donnée
        if(isset($_POST['email'])){                                 
            session_name('CHEMIN');
            session_start();
            require_once $_SESSION["APPLICATION"].'/BDD/connexion.bdd.php'; 
            require_once $_SESSION["APPLICATION"].'/FONCTIONCOMMUN/fonctionutile.php';
            $bdd = connect();
            
            $Email = $_POST['email'];
            if(is_unique_login($session, $Email)){
                if($_POST["password"] == $_POST["passwordcf"]){
                    $Password = password_hash($_POST["password"],PASSWORD_DEFAULT);
                    $Nom = $_POST['nom'];
                    $Prenom = $_POST['prenom'];
                    $Type = $_POST['typeu'];

                    $requete = $bdd->query("INSERT INTO utilisateurs(NomU,PrenomU,Email,MotDePasse,TypeU) VALUES($Nom,$Prenom,$Email,$Password,$Type)");
      
                    session_name('UTILISATEUR');
                    session_start();                                 //Après l'inscription, l'utilisateur se connecter automatiquement

                    $_SESSION['email'] = $Email;
                    $_SESSION['password'] = $Password;

                    header("Location: Accueil.php");                 // Vers la page Accueil

                    // Envoyer un mail, mais on ne peut pas tester en utilisant un serveur local, on va aussi essayer avec "SendGrid"

                     $destinataire = "$Email"; // adresse mail du destinataire
                     $sujet = "Confirmation de la création de compte"; // sujet du mail
                     $message = "Vous venez de créer un compte"; // message qui dira que le destinataire a bien lu votre mail
                     // maintenant, l'en-tête du mail
                     $header = "From: l'email d'un administrateur\r\n"; 
                     $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                     mail ($destinataire, $sujet, $message, $header); // on envois le mail
                }  else {
                    ?>
                <script type="text/javascript">
                    alert("Veuillez saisir deux fois le même mot de passe !");
                    document.location.href = 'Inscription.php';
                </script>
                <?php     
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("Cet Email est déjà utilisé. \n Veuillez réessayer avec un autre email !");
                    document.location.href = 'Inscription.php';
                </script>
                <?php        
            }
        }
        
    }




?>

