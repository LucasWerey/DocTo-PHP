<?php
    $id = @mysqli_connect ("localhost", "root", "root","omnessante") or die("Erreur de connexion");
    $res=mysqli_query($id,"SELECT * from medecins");
    /*echo mysqli_num_rows($res)." enregistrements";
    echo "<hr />";*/
    while($tab=mysqli_fetch_assoc($res)){
        if ($tab['id']==2){
            echo implode("<br>",$tab);
        }
    }
    mysqli_close($id);
    
?>