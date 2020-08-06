<?php
require_once('Fonctions.php');

if (isset($note) or isset($avis)){
    $sql = "INSERT INTO evaluation(Note,Avis) VALUES({$_POST["rating"]},'{$_POST["avis"]}') ";
    mysqli_query ($session, $sql);
}
?>