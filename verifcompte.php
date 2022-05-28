<?php 
    $db = mysqli_connect('localhost', 'root', 'root','omnessante') or die('could not connect to database');
    $requete = "SELECT * FROM `compte`";
    $result = mysqli_query($db,$requete) or die(mysqli_error($db));
    $total = mysqli_num_rows($result);
    $verif = false;
    if($total > 0) {
        while($row = mysqli_fetch_array($result)){
            if ($row['conn']==true){
                $verif=true;
                if ($row['type']=='medecin' || $row['type']=='labo'){
                    header('Location: compteMedecin.php');
                }elseif ($row['type']=='client'){
                    header('Location: compteClient.php');
                }elseif ($row['type']=='admin'){
                    header('Location: compteAdmin.php');
                }
            } 
        }  
    }
    if ($verif==false){
        header('Location: compte.php');
    }
    mysqli_close($db); // fermer la connexion
?>