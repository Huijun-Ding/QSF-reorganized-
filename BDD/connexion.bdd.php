<?php
        // Connexion à la base de donnée
        try
        {
            global $bdd;
            $bdd = new PDO("mysql:host=localhost;dbname=talentland;charset=utf8", "root","");
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }      
        
      

        
        /*$aConfig = parse_ini_file(confid.php);
        $mail ->Host = $aConfig['SMTPHost'];
        $mail ->Port = $aConfig['SMTPPort'];*/
?>


        
        
        
        

        
        