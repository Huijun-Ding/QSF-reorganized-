<?php
        // Connexion à la base de donnée
        try
        {
            $bdd = new PDO ('mysql:localhost;dbname=talentland;charset=utf8', 'root', '');
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }      
        
        /*$aConfig = parse_ini_file(confid.php);
        $mail ->Host = $aConfig['SMTPHost'];
        $mail ->Port = $aConfig['SMTPPort'];*/
?>


        
        
        
        

        
        