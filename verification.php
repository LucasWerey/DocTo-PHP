<?php
session_start();
if(isset($_POST['logemail']) && isset($_POST['logpass']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'omnessante';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = isset($_POST['logemail']) ? $_POST['logemail'] : '';
    $password = isset($_POST['logpass']) ? $_POST['logpass'] : '';
    /*$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['logemail'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['logpass']));*/
    
    if($username !== "" && $password !== "")
    {
       $requete = "SELECT * FROM compte WHERE username = '".$username."' and password = '".$password."'";
        /*$requete = "SELECT count(*) FROM compte where 
              username = '".$username."' and password = '".$password."' ";*/
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['logemail'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: compte.html?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: compte.html?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: compte.html');
}
mysqli_close($db); // fermer la connexion
?>