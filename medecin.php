<?php
    $id = @mysqli_connect ("localhost", "root", "root","omnessante") or die("Erreur de connexion");
    $res=mysqli_query($id,"SELECT * from medecins");
    /*echo mysqli_num_rows($res)." enregistrements";
    echo "<hr />";*/
    $lien = isset ($_POST['lien']) ? $_POST['lienitle'] : '';
    while($tab=mysqli_fetch_assoc($res)){
        if ($lien == $tab['prenom'] + ' ' + $tab['nom']){

        }
        echo implode("   ",$tab);
        echo "<br/>";
    }

    mysqli_close($id);
    
?>