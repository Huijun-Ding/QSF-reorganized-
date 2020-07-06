<?php


    function afficher_besoins() {
        
        $bdd = connect();
        
        $requete = $bdd->query("select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC");
        
        while ($resultat = $requete ->fetch()) {
             if ($resultat["VisibiliteB"] == 1) {   
                 // Fonctions pour gérer les badges
                            if ($resultat["TypeB"] == 'Pro et Perso') {
                                echo ('<div><h5><span class="badge badge-info">'.$resultat["TypeB"].'</span></h5>');
                            } elseif ($resultat["TypeB"] == 'Pro') {
                                echo ('<div><h5><span class="badge badge-success">'.$resultat["TypeB"].'</span></h5>');
                            } elseif ($resultat["TypeB"] == 'Perso') {
                                echo ('<div><h5><span class="badge badge-warning">'.$resultat["TypeB"].'</span></h5>');
                            }               
            ?>
                            <div class="card" style="width: 12rem;">                                 
                            <img src="<?php echo $resultat['PhotoC'];?>" class="card-img-top" alt="<?php echo $resultat['NomC'];?>">
                            <div class="card-body card text-center">
                            <h5 class="card-title"><?php echo $resultat['TitreB'];?></h5>
                            <p class="card-text">Délais souhaité: <?php echo $resultat['DateButoireB'];?></p>
                            <a href="BesoinX.php?t=<?php echo $resultat['CodeB'];?>" class="btn btn-outline-dark">Voir la demande</a>
                            </div>
                            </div>
            <?php
                            echo('</div>'); 
                             }
        }
        
        //if (count($resultat)=0) {
            //echo('<h5> Aucun résultat</h5>');
        //}
      
    }
 
    
    
    
    
?>