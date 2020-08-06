<?php 


   // 1. Tester si l'utilisateur est connecté avant créer un nouveau besoin
/*
            function login_pour_nouveau_besoin() {
                if (isset($_SESSION['email'])) {
                    echo ('<a href="Creer1Besoin.php"><button type="button" class="btn btn-light">Créer un nouveau besoin</button></a>');
                } else {
                    echo ('<a href="'.$_SESSION['APPLICATION'].'/FONCTIONNALITE/INSCRIPTION/connexion.html.php"><button type="button" class="btn btn-light">Créer un nouveau besoin</button></a>');
                }
            }
*/

    // 2. Créer un nouveau besoin

        $Titre = $_POST['titre'];   // récupéré les valeurs selon la méthode POST
        $Description = $_POST['description'];
        $DateButoire = $_POST['datebutoire'];
        $Type = $_POST['type'];   
        $DatePublicationB = date("yy/m/d");
        $Categorie = $_POST['categorie'];

        $bdd = connect();
        
        $requete = $bdd->query("INSERT INTO besoins(TitreB,DescriptionB,DateButoireB,DatePublicationB,TypeB,CodeC) VALUES($Titre, $Description, $DateButoire, $DatePublicationB, $Type, $Categorie)");
     
        if ($requete == true) {
            // Ajouter CodeB et CodeU dans la table Saisir
            $requete2 = $bdd->query("select CodeB from besoins order by CodeB DESC limit 1");
         
            if ($requete2 == true) {
                while ($code = $requete2 ->fetch()) {   
                    $codeb = $code['CodeB'];
                    $requete3 = $bdd->query("INSERT INTO saisir(CodeU,CodeB) VALUES($usercode, $codeb)");  // insérer le code de l'utilisateur et le code de catégorie dans le table abonner
                 }  
            }
            

            header("Location: MonProfil.php");

            $Email = $bdd->query("select Email from utilisateurs where CodeU = $usercode");

                $destinataire = "$Email"; // adresse mail du destinataire
                $sujet = "Enregistement de votre besoin"; // sujet du mail
                $message = "Votre demande a bien été enregistrée et publiée. Vous recevrez une notification dès qu’une personne se sera positionnée sur votre besoin. Vous pourrez alors vous mettre en relation."; // message qui dira que le destinataire a bien lu votre mail
                // maintenant, l'en-tête du mail
                $header = "From: [Quai des savoir-faire]\r\n"; 
                $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
                $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                mail ($destinataire, $sujet, $message, $header); // on envois le mail    
        } else {
            ?>
               <script>
                   alert("Désolé, votre besoin n'a pas été enregistré ! \nVeuillez saisir toutes les information correctement ! \n(La date butoire d'un besoin doit être supérieure à aujourd'hui)");
                   document.location.href = 'Creer1Besoin.php';
                </script>
                <?php     
        }
?>