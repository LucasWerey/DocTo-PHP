<?php 
    $db = mysqli_connect('localhost', 'root', 'root','omnessante') or die('could not connect to database');
    $requete = "UPDATE `compte` SET `conn`=false";
    $result = mysqli_query($db,$requete) or die(mysqli_error());
    header('Location: verifcompte.php');

    mysqli_close($db); // fermer la connexion
?>