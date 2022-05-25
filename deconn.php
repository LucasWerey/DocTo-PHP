<?php 
    $db = mysqli_connect('localhost', 'root', 'root','omnessante') or die('could not connect to database');
    $requete = "SELECT * FROM `compte`";
    $result = mysqli_query($db,$requete) or die(mysqli_error());
    $total = mysqli_num_rows($result);
    $verif = false;
    if($total > 0) {
        while($row = mysqli_fetch_array($result)){
            if ($row['conn']==true){
                $verif=true;
                $username=$row['username'];
                $requete2="UPDATE `compte` SET `conn`=false WHERE `username`='".$username."' ";
                if (mysqli_query($db,$requete2)){
                    header('Location: compte.php');
                }else{
                    header('Location: compteClient.php?erreur=1');//la requête n'a pas marché, le client n'est pas déconnecté
                }
            } 
        }  
    }
    if ($verif==false){
        header('Location: compteClient.php?erreur=2'); //pas de client connecté trouvé
    }
    mysqli_close($db); // fermer la connexion
?>