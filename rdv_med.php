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
                        <a class="nav-link" href="acceuil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="toutParcourir.php">Tout Parcourir</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="rendezvous.php">Rendez-vous <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="verifcompte.php">Votre Compte</a>
                    </li>
                </ul>
                <form action="search.php" method="GET" class="form-inline mt-2 mt-md-0" style="padding-right: 100px">
                    <input type="text" name="terme" class="form-control mr-sm-2" placeholder="Votre recherche" aria-label="Search">
                    <input type="submit" name="s" value="Rechercher" class="btn btn-outline-success my-2 my-sm-0">
                </form>
            </div>
        </nav>
    </header>

    <div class="container-fluid" style="margin-top:50px;">

        <table align="center" width="45%" class="tabloclem">
            <tr>
                <th>LUNDI</th>
                <th>MARDI</th>
                <th>MERCREDI</th>
                <th>JEUDI</th>
                <th>VENDREDI</th>
                <th>SAMEDI</th>
            </tr>
            <?php
            $name = isset($_POST["nom"]) ? $_POST["nom"] : "";

            $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
            $requete = "SELECT * FROM `horaire`";
            $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $name . "'";
            $result = mysqli_query($db, $requete) or die(mysqli_error($db));
            $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
            $total = mysqli_num_rows($result); //toutes les lignes des horaires
            $total2 = mysqli_num_rows($result2); //normalement 1 ligne
            $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
            $id_med = $row2['id'];
            //define('id_med',$id_med);

            /*$requete_compte="SELECT * FROM `compte` WHERE `conn`=true";
            $result_compte = mysqli_query($db, $requete_compte) or die(mysqli_error($db));
            $row_compte = mysqli_fetch_array($result_compte); //tableau à 1 ligne
            $user_cl=$row_compte['username'];

            $requete_cl="SELECT * FROM `clientinf` WHERE `Mail`='".$user_cl."'";
            $result_cl= mysqli_query($db, $requete_cl) or die(mysqli_error($db));
            $row_cl=mysqli_fetch_array($result_cl); //tableau à 1 ligne
            $id_cl=$row_cl['IdCl'];*/

            $id_cl = "1";

            if ($total > 0) {
                if ($total2 > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $heure = $row['heure'];
                        if ($heure < "12:00") {
                            if ($row2['lundiam'] == "1") {
                                echo "<tr><td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='lundi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['mardiam'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='mardi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['mercrediam'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='mercredi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['jeudiam'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='jeudi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['vendrediam'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='vendredi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['samediam'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='samedi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td></tr>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                            }
                        } else {
                            if ($row2['lundipm'] == "1") {
                                echo "<tr><td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='lundi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<tr><td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['mardipm'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='mardi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['mercredipm'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='mercredi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['jeudipm'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='jeudi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['vendredipm'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='vendredi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td>";
                            }
                            if ($row2['samedipm'] == "1") {
                                echo "<td><form action='' method='POST'>
                                <input type='hidden' name='jour' value='samedi' style='opacity: 0;'>
                                <input type='hidden' name='n' value='" . $name . "' style='opacity: 0;'>
                                <input type='submit' name='h' value='" . $heure . "'></form></td></tr>";
                            } else {
                                echo "<td bgcolor='red' bordercolor='red'>" . $heure . "</td></tr>";
                            }
                        }
                    }
                }
            }/*else {
                    header('Location: acceuil.php?erreur=2'); //Aucune ligne dans la table médecin
                }

            } else {
                header('Location: acceuil.php?erreur=1'); //Aucune ligne dans la table horaire
            }*/
            mysqli_close($db); // fermer la connexion
            ?>
        </table>
    </div>

    <?php

    if (isset($_POST['h']) && isset($_POST['n']) && isset($_POST['jour'])) {
        $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
        $name = isset($_POST['n']) ? $_POST['n'] : "";
        $jour = isset($_POST['jour']) ? $_POST['jour'] : "";

        $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $name . "'";
        $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
        $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
        $id_med = $row2['id'];

        $rdv = isset($_POST['h']) ? $_POST['h'] : "";

        /*$requete_compte = "SELECT * FROM `compte` WHERE `conn`=true";
        $result_compte = mysqli_query($db, $requete_compte) or die(mysqli_error($db));
        $row_compte = mysqli_fetch_array($result_compte); //tableau à 1 ligne
        $user_cl = $row_compte['username'];

        $requete_cl = "SELECT * FROM `clientinf` WHERE `Mail`='" . $user_cl . "'";
        $result_cl = mysqli_query($db, $requete_cl) or die(mysqli_error($db));
        $row_cl = mysqli_fetch_array($result_cl); //tableau à 1 ligne
        $id_cl = $row_cl['IdCl'];*/
        $id_cl = "1";

        $requete = "INSERT INTO `rdv`(`id_cl`, `id_med`, `date`, `heure`, `adresse`, `digicode`, `prix`) VALUES (" . $id_cl . "," . $id_med . ",'" . $jour . "','" . $rdv . "','37 Quai de Grenelle','456A7','25')";
        $result = mysqli_query($db, $requete) or die(mysqli_error($db));
    }
    ?>

    <?php include("footer.html"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>