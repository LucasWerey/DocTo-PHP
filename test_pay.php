<?php
    session_start();
    
    if (isset($_POST['h']) && isset($_POST['jour'])) {
        $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

        $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $_SESSION['name'] . "'";
        $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
        $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
        $id_med = $row2['id'];

        $rdv = isset($_POST['h']) ? $_POST['h'] : "";
        $jour = isset($_POST['jour']) ? $_POST['jour'] : "";

        //Ajoute le rdv à la table `rdv`
        $requete = "INSERT INTO `rdv`(`id_cl`, `id_med`, `date`, `heure`, `adresse`, `digicode`, `prix`) VALUES (" . $_SESSION['id_cl'] . "," . $id_med . ",'" . $jour . "','" . $rdv . "','37 Quai de Grenelle','456A7','25')";
        $result = mysqli_query($db, $requete) or die(mysqli_error($db));

        mysqli_close($db); // fermer la connexion
        //IL FAUT ALLER VERS LA PAGE PAYEMENT
        echo "<script> location.replace('verifcompte.php'); </script>";
        session_destroy();
    }
    ?>