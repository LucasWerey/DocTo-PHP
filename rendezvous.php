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
<?php include("header.php"); ?>
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
                //if ($referer == 'http://localhost:62100/projetweb/medgenerale.php'){
                //if ($referer == 'http://localhost/ProjetWeb/medgenerale.php') {
                if ($referer !== 'http://localhost/projetweb/medgenerale.php'){
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
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['lundiam'] == "1") {
                                      
                                        echo "<tr><td><form action='test_pay.php' method='POST'>
                                        <input type='hidden' name='jour' value='lundi' style='opacity: 0;'>
                                        <input type='submit' name='h' value='" . $heure . "'></form></td>";
                                        
                                    } else {
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
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
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['samediam'] == "1") {
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['lundipm'] == "1") {
                                     
                                        echo "<tr><td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                      
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                        echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                                        $verif_rdv = false;
                                    } elseif ($row2['samedipm'] == "1") {
                                      $_SESSION['jour']='samedi';
                                        echo "<td><form action='test_pay.php' method='POST'>
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
                                echo "<h4>Vous avez rendez vous avec le médecin : " . $nommed . " " . $prenomed . " le " . $row_rdv_cl['date'] . " a " .
                                    $row_rdv_cl['heure'] . ".<br>Adresse : " . $row_rdv_cl['adresse'] . "<br>Digicode : " .
                                    $row_rdv_cl['digicode'] . "<br>Prix de la consultation : " . $row_rdv_cl['prix'] . 
                                    " €<br><br><a href='toutParcourir.php'>Prendre un nouveau rendez-vous</a></h4>";
                            }
                        }
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