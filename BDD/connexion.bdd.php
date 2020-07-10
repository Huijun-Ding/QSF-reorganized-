<?php
        // Connexion à la base de donnée
        $aConfig = parse_ini_file($_SESSION["APPLICATION"].'/config.php');
        //$mail->Host=$aConfig['SMTPHost'];
        //$mail->Port=$aConfig['SMTPPort'];
        //require_once $_SESSION["APPLICATION"].'/config.php';
        
        function connect(){
               try
               {
                    //$bdd = new PDO("mysql:host=localhost;dbname=talentland;charset=utf8","root","");
                    //$bdd = new PDO("mysql:host=".$aConfig['HOST'].";dbname=".$aConfig['BD'].";charset=utf8",$aConfig['LOGIN'],$aConfig['PASS']);
                    //$bdd = new PDO("mysql:host=HOST;dbname=BD;charset=utf8","LOGIN","PASS");
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                } catch (Exception $ex) {
                    die('Erreur : '.$ex->getMessage());
                }      
                return $bdd;
        }
        

?>


        
        
        
        

        
        