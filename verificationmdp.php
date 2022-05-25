<?php
session_start();
if(isset($_POST['logemail']) && isset($_POST['logpass1']) && isset($_POST['logpass2']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'omnessante';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['logemail'])); 
    $password1 = mysqli_real_escape_string($db,htmlspecialchars($_POST['logpass1']));
    $password2 = mysqli_real_escape_string($db,htmlspecialchars($_POST['logpass2']));
    
    if($username !== "" && $password1 !== "" && $password2 !== "")
    {
        if ($password1 == $password2){
            $requete = "SELECT count(*) FROM compte where 
              username = '".$username."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) // nom d'utilisateur correcte
            {
                $_SESSION['logemail'] = $username;
                $requete2="UPDATE `compte` SET `password`='".$password1."' WHERE `username`='".$username."' ";
                if (mysqli_query($db,$requete2)){
                    header('Location: compte.php');
                }else{
                    header('Location: mdp.php?erreur=4');//les modifs ne se sont pas enregistrés
                }
            }
            else
            {
                header('Location: mdp.php?erreur=1');//utilisateur incorrect
            }
        }else{
            header('Location: mdp.php?erreur=2'); // mots de passe différents
        }
    }
    else
    {
       header('Location: mdp.php?erreur=3'); //utilisateur ou mots de passe vide
    }
}
else
{
   header('Location: compte.php');
}
mysqli_close($db); // fermer la connexion
?>