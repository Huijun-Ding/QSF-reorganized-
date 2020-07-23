<?php
        // Connexion à la base de donnée
                
        function connect(){
               try
               {  
                    //$bdd = new PDO("mysql:host=localhost;dbname=talentland;charset=utf8","root","");
                    
                    //PDO
                    //$aConfig = parse_ini_file($_SESSION["APPLICATION"].'/config.php');                     
                    //$bdd = new PDO();
                    
                    //PDO2
                    //require_once $_SESSION["APPLICATION"].'/config.php';
                    //$bdd = new PDO("mysql:host=.HOST.;dbname=.BD.;charset=utf8",".LOGIN.",".PASS.");

                    
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    return $bdd;
                } catch (Exception $ex) {
                    die('Erreur : '.$ex->getMessage());
                }      
        }
     
        
        /*
         * 
[PDO] 
HOST="localhost"
LOGIN="root"
PORT="3306"
PASS=""
BD="talentland"

[PDO2] 
define ("HOST","localhost"); 
define ("LOGIN","root");
define ("PORT","3306");
define ("PASS","");
define ("BD","talentland");
         */
?>