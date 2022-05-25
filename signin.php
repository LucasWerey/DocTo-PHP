<?php
session_start();
if(isset($_POST['logemail']) && isset($_POST['logpass'])&& isset($_POST['logfname'])&& isset($_POST['logname'])
&& isset($_POST['logaddress'])&& isset($_POST['logtel'])&& isset($_POST['logcartev']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'omnessante';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    /*$username = isset($_POST['logemail']) ? $_POST['logemail'] : '';
    $password = isset($_POST['logpass']) ? $_POST['logpass'] : '';*/
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['logemail']));
    $fname = mysqli_real_escape_string($db,htmlspecialchars($_POST['logfname']));;
    $name = mysqli_real_escape_string($db,htmlspecialchars($_POST['logname']));;
    $address = mysqli_real_escape_string($db,htmlspecialchars($_POST['logaddress']));;
    $tel = mysqli_real_escape_string($db,htmlspecialchars($_POST['logtel']));;
    $cartev = mysqli_real_escape_string($db,htmlspecialchars($_POST['logcartev']));;
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['logpass']));
    $type = "client";
    
    if($username !== "" && $password !== "" && $fname !== "" && $name !== ""
    && $address !== "" && $tel !== "" && $cartev !== "")
    {
       /*$requete = "SELECT * FROM compte WHERE username = '".$username."' and password = '".$password."'";*/
        $requete1 = "INSERT INTO `clientinf`(`Nom`, `Prenom`, `Adresse1`, `Ville`, `CodePostal`, `Pays`, `Tel`, `CVClient`, `mail`) 
        VALUES ('".$fname."','".$name."','".$address."','0',0,'0','".$tel."','".$cartev."','".$username."')";
        $requete2 = "INSERT INTO `compte`(`username`, `password`, `type`) VALUES ('".$username."','".$password."','".$type."')";
        if (mysqli_query($db,$requete1)){
            echo "Enregistrement 1 realise avec succes";
            header('Location: compte.php');
    }else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
        
        if (mysqli_query($db,$requete2)){
            echo "Enregistrement 2 realise avec succes";
            header('Location: compte.php');
        }else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
        /*$exec_requete1 = mysqli_query($db,$requete1);
        $exec_requete2 = mysqli_query($db,$requete2);
        $reponse1 = mysqli_fetch_array($exec_requete1);
        $count = $reponse1['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['logemail'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: compte.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }*/
    }
    else
    {
       header('Location: compte.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: compte.php');
}

mysqli_close($db); // fermer la connexion
?>