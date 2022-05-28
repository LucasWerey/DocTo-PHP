<?php
session_start();
$id_session = session_id();
$name = isset($_POST["nom"]) ? $_POST["nom"] : "";
if ($name !== "") {
    $_SESSION['name'] = $name;
}
//$_SESSION['name']='Petit';
?>

<style>
    <?php include 'style.css'; ?>
</style>

<!doctype html>
<html lang="fr">

<head>
    <title>Rendez-vous médecin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- The icon of the website. -->
    <link rel="icon" href="Images/logo.png">

</head>

<body>
    <!-- NavBar -->

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-green">
            <a class="navbar-brand" href="acceuil.php"><img src="Images/logo.png" width="20%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="acceuil.php">Accueil </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="toutParcourir.php">Tout Parcourir</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="rdv_med.php">Rendez-vous <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="verifcompte.php">Votre Compte</a>
                    </li>
                </ul>
                <form action="search.php" method="GET" class="form-inline mt-2 mt-md-0" style="padding-right: 100px">
                    <input type="text" name="terme" class="form-control mr-sm-2" placeholder="Votre recherche" aria-label="Search">
                    <input type="submit" name="s" value="Rechercher" class="btn btn-outline-success my-2 my-sm-0">

                </form>
                <?php

                $con = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
                $sql = 'SELECT * FROM compte';
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                while ($row = mysqli_fetch_array($result)) {
                    if ($result->num_rows > 0) {
                        if ($row['conn'] == 1) {
                            echo '<form class="form-inline mt-2 mt-md-0" style="margin-right:-70px;">
          <a href="deconn.php"><img src="Images/deco.png" width="20%"></a>
        </form>';
                        }
                    }
                }
                ?>
            </div>
        </nav>
    </header>

    <div class="container-fluid" style="margin-top:50px;">

        <table class="tabloclem">
            <?php
            //$name = isset($_POST["nom"]) ? $_POST["nom"] : "";

            $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

            //On regarde si qlqn est connecté
            $requete_compte = "SELECT * FROM `compte` WHERE `conn`=true";
            $result_compte = mysqli_query($db, $requete_compte) or die(mysqli_error($db));
            $num_row_compte = mysqli_num_rows($result_compte); //normalement 1 ligne

            if ($num_row_compte > 0) {
                //On récupère l'username (mail) du client
                $row_compte = mysqli_fetch_array($result_compte); //tableau à 1 ligne
                $_SESSION['user_cl'] = $row_compte['username'];

                //On récupère l'id du client
                $requete_cl = "SELECT * FROM `clientinf` WHERE `Mail`='" . $_SESSION['user_cl'] . "'";
                $result_cl = mysqli_query($db, $requete_cl) or die(mysqli_error($db));
                $row_cl = mysqli_fetch_array($result_cl); //tableau à 1 ligne
                $_SESSION['id_cl'] = $row_cl['IdCl'];

                //Référence à la page précédente
                $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'verifcompte.php';
                if (
                    $referer == 'http://localhost:62378/projetweb/medgenerale.php' ||
                    $referer == 'http://localhost:62378/projetweb/addictologie.php' ||
                    $referer == 'http://localhost:62378/projetweb/andrologie.php' ||
                    $referer == 'http://localhost:62378/projetweb/cardiologie.php' ||
                    $referer == 'http://localhost:62378/projetweb/dermatologie.php' ||
                    $referer == 'http://localhost:62378/projetweb/gastro.php' ||
                    $referer == 'http://localhost:62378/projetweb/gynecologie.php' ||
                    $referer == 'http://localhost:62378/projetweb/ist.php' ||
                    $referer == 'http://localhost:62378/projetweb/osteopathie.php'
                ) {
                    //if ($referer == 'http://localhost/ProjetWeb/medgenerale.php') {
                    /*if (
                    $referer == 'http://localhost/projetweb/medgenerale.php' ||
                    $referer == 'http://localhost/projetweb/addictologie.php' ||
                    $referer == 'http://localhost/projetweb/andrologie.php' ||
                    $referer == 'http://localhost/projetweb/cardiologie.php' ||
                    $referer == 'http://localhost/projetweb/dermatologie.php' ||
                    $referer == 'http://localhost/projetweb/gastro.php' ||
                    $referer == 'http://localhost/projetweb/gynecologie.php' ||
                    $referer == 'http://localhost/projetweb/ist.php' ||
                    $referer == 'http://localhost/projetweb/osteopathie.php'
                ) {*/

                    //On récupère les horaires pour créer le tableau
                    $requete = "SELECT * FROM `horaire`";
                    $result = mysqli_query($db, $requete) or die(mysqli_error($db));
                    $total = mysqli_num_rows($result); //toutes les lignes des horaires


                    //On récupère l'id du médecin
                    $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $_SESSION['name'] . "'";
                    $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
                    $total2 = mysqli_num_rows($result2); //normalement 1 ligne
                    $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
                    $_SESSION['id_med'] = $row2['id'];

                    //On récupère les rdv du médecin déjà booké
                    $requete_rdv = "SELECT * from `rdv` WHERE `id_med`=" . $_SESSION['id_med'];
                    $verif_rdv = false;

                    if ($total > 0) {
                        if ($total2 > 0) {
                            echo "<tr>
                        <th>LUNDI</th>
                        <th>MARDI</th>
                        <th>MERCREDI</th>
                        <th>JEUDI</th>
                        <th>VENDREDI</th>
                        <th>SAMEDI</th>
                        </tr>";
                            while ($row = mysqli_fetch_array($result)) {
                                $heure = $row['heure'];
                                if ($heure < "12:00") {

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "lundi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<tr><td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['lundiam'] == "1") {

                                        echo "<tr><td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='lundi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<tr><td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }


                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "mardi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['mardiam'] == "1") {
                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='mardi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "mercredi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['mercrediam'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='mercredi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "jeudi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['jeudiam'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='jeudi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "vendredi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['vendrediam'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='vendredi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "samedi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                                        $verif_rdv = false;
                                    } elseif ($row2['samediam'] == "1") {
                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='samedi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td></tr>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                                    }
                                } else {
                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "lundi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<tr><td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['lundipm'] == "1") {

                                        echo "<tr><td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='lundi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<tr><td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "mardi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['mardipm'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='mardi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "mercredi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['mercredipm'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='mercredi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "jeudi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['jeudipm'] == "1") {
                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='jeudi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "vendredi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['vendredipm'] == "1") {

                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='vendredi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                    }

                                    $result_rdv = mysqli_query($db, $requete_rdv) or die(mysqli_error($db));
                                    $total_rdv = mysqli_num_rows($result_rdv);
                                    if ($total_rdv > 0) {
                                        while ($row_rdv = mysqli_fetch_array($result_rdv)) {
                                            if ($heure == $row_rdv['heure'] && $row_rdv['date'] == "samedi") {
                                                $verif_rdv = true;
                                            }
                                        }
                                    }
                                    if ($verif_rdv == true) {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                                        $verif_rdv = false;
                                    } elseif ($row2['samedipm'] == "1") {
                                        $_SESSION['jour'] = 'samedi';
                                        echo "<td><form action='payement.php' method='POST'>
                                        <input type='hidden' name='jour' value='samedi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td></tr>";
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                                    }
                                }
                            }
                        }
                    }
                } else {
                    //Affichage des rdv
                    $requete_rdv_cl = "SELECT * FROM `rdv` WHERE `id_cl`=" . $_SESSION['id_cl'];
                    $result_rdv_cl = mysqli_query($db, $requete_rdv_cl) or die(mysqli_error($db));
                    $total_rdv_cl = mysqli_num_rows($result_rdv_cl);
                    //Affichage des rdv
                    $requete_rdv_clabo = "SELECT * FROM `rdv_labo` WHERE `id_cl`=" . $_SESSION['id_cl'];
                    $result_rdv_clabo = mysqli_query($db, $requete_rdv_clabo) or die(mysqli_error($db));
                    $total_rdv_clabo = mysqli_num_rows($result_rdv_clabo);

                    if ($total_rdv_cl > 0 || $total_rdv_clabo > 0) {
                        if ($total_rdv_cl > 0) {
                            while ($row_rdv_cl = mysqli_fetch_array($result_rdv_cl)) {
                                $id_medecin = $row_rdv_cl['id_med'];
                                $ridmed = "SELECT * FROM `medecins` WHERE `id`=" . $id_medecin;
                                $residmed = mysqli_query($db, $ridmed) or die(mysqli_error($db));
                                $totidmed = mysqli_num_rows($residmed);
                                if ($totidmed > 0) {
                                    $rowidmed = mysqli_fetch_array($residmed);
                                    $nommed = $rowidmed['nom'];
                                    $prenomed = $rowidmed['prenom'];
                                    $spemed = $rowidmed['spe'];
                                    echo "<h4>Vous avez rendez vous avec le médecin : " . $nommed . " " . $prenomed . " le " . $row_rdv_cl['date'] . " à " .
                                        $row_rdv_cl['heure'] . ".<br>Specialité : " . $spemed . "<br>Adresse : " . $row_rdv_cl['adresse'] . "<br>Digicode : " .
                                        $row_rdv_cl['digicode'] . "<br>Prix de la consultation : " . $row_rdv_cl['prix'] .
                                        " €<br><br>
                                    <form action='' method='POST'>
                                    <input type='submit' name='" . $id_medecin . $row_rdv_cl['date'] . $row_rdv_cl['heure'] . "' value='Annuler le rdv'>
                                    </form></h4>";
                                    if (isset($_POST[$id_medecin . $row_rdv_cl["date"] . $row_rdv_cl["heure"]])) {
                                        //echo "<h2>DELETE FROM `rdv` WHERE `id_cl`=".$_SESSION['id_cl']." AND `id_med`=".$id_medecin." AND `date`='".$row_rdv_cl['date']."' AND `heure`='".$row_rdv_cl['heure']."'</h2>";
                                        $requete_annul = "DELETE FROM `rdv` WHERE `id_cl`=" . $_SESSION['id_cl'] . " AND `id_med`=" . $id_medecin . " AND `date`='" . $row_rdv_cl['date'] . "' AND `heure`='" . $row_rdv_cl['heure'] . "'";
                                        $result_annul = mysqli_query($db, $requete_annul) or die(mysqli_error($db));
                                        echo "<script> location.replace('rdv_med.php'); </script>";
                                        //echo "<h2>Le rdv a bien été annulé</h2>";
                                    }
                                }
                            }
                        } else {
                            while ($row_rdv_clabo = mysqli_fetch_array($result_rdv_clabo)) {
                                $id_labo = $row_rdv_clabo['id_labo'];
                                $reqidlabo = "SELECT * FROM `labo` WHERE `Idlabo`=" . $id_labo;
                                $residlabo = mysqli_query($db, $reqidlabo) or die(mysqli_error($db));
                                $totidlabo = mysqli_num_rows($residlabo);
                                if ($totidlabo > 0) {
                                    $rowidlabo = mysqli_fetch_array($residlabo);
                                    $nomlabo = $rowidlabo['Nom'];
                                    $spelabo = $_SESSION['service'];
                                    echo "<h4>Vous avez rendez vous au laboratoire : " . $nomlabo . " le " . $row_rdv_clabo['date'] . " à " .
                                        $row_rdv_clabo['heure'] . ".<br>Specialité : " . $spelabo . "<br>Adresse : " . $row_rdv_clabo['adresse'] . "<br>Digicode : " .
                                        $row_rdv_clabo['digicode'] . "<br>Prix de la consultation : " . $row_rdv_clabo['prix'] .
                                        " €<br><br>
                                    <form action='' method='POST'>
                                    <input type='submit' name='" . $id_labo . $row_rdv_clabo['date'] . $row_rdv_clabo['heure'] . "' value='Annuler le rdv'>
                                    </form></h4>";
                                    if (isset($_POST[$id_labo . $row_rdv_clabo["date"] . $row_rdv_clabo["heure"]])) {
                                        //echo "<h2>DELETE FROM `rdv` WHERE `id_cl`=".$_SESSION['id_cl']." AND `id_med`=".$id_medecin." AND `date`='".$row_rdv_cl['date']."' AND `heure`='".$row_rdv_cl['heure']."'</h2>";
                                        $requete_annulabo = "DELETE FROM `rdv` WHERE `id_cl`=" . $_SESSION['id_cl'] . " AND `id_labo`=" . $id_labo . " AND `date`='" . $row_rdv_clabo['date'] . "' AND `heure`='"
                                            . $row_rdv_clabo['heure'] . "' AND `service`='" . $_SESSION['service'] . "'";
                                        $result_annulabo = mysqli_query($db, $requete_annulabo) or die(mysqli_error($db));
                                        echo "<script> location.replace('rdv_labo.php'); </script>";
                                        //echo "<h2>Le rdv a bien été annulé</h2>";
                                    }
                                }
                            }
                        }
                        echo "<a href='toutParcourir.php'>Prendre un nouveau rendez-vous</a>";
                    } else {
                        echo "<h2>Vous n'avez pas encore pris de rendez-vous.<br><a href='toutParcourir.php'>
                        Vous pouvez prendre un rendez vous ici.</a></h2>";
                    }
                }
            } else {
                //header('Location: verifcompte.php'); //On va sur la page verifcompte.php pour se co
                echo "<h2><a style='margin-top:50px;' href='verifcompte.php'>Veuillez vous connecter ou créer un compte pour pouvoir prendre un rendez-vous</a></h2>";
            }
            mysqli_close($db); // fermer la connexion
            ?>
        </table>
    </div>

    <?php include("footer.html"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>