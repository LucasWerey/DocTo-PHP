<style>
    <?php include 'style.css'; ?>
</style>


<!doctype html>
<html lang="en">

<head>
    <title>Compte Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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
                        <a class="nav-link" href="toutParcourir.php">Tout Parcourir </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rdv_med.php">Rendez-vous</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="verifcompte.php">Votre Compte<span class="sr-only">(current)</span></a>
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

    <!------ ADMIN FORM ---------->
    <div class="container emp-profile">
        <form method="post">
            <div class="row">

                <div class="col-md-6">
                    <div class="profile-head">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Médecins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laboratoires</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stat-tab" data-toggle="tab" href="#stat" role="tab" aria-controls="stat" aria-selected="false">Statistiques</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </form>


        <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="" method="post" enctype="multipart/form-data">
                    <select name="selector">
                        <option value="Choisir un médecin"> Choisir un médecin </option>

                        <?php
                        $res = 'SELECT * FROM medecins order by nom asc';
                        $nom = mysqli_query($con, $res);

                        while ($row1 = mysqli_fetch_array($nom)) {
                            echo '<option value=' . $row1['nom'] . '>' . $row1['prenom'] . ' ' . $row1['nom'] . '</option>';
                        }
                        ?>

                    </select>

                    <input type="submit" name="choix" value="Voir">


                    <div class="container-marketing" style="padding-left:220px;">




                        <?php
                        if (isset($_POST['choix'])) {
                            if (!empty($_POST['selector'])) {
                                $selected = $_POST['selector'];


                                $query = $con->query("SELECT * from medecins where nom='" . $selected . "'");

                                if ($query->num_rows > 0) {
                                    $cmsData = $query->fetch_assoc();
                        ?>

                                    <div class="row" style="padding-left:50px;">
                                        <div class="col-md-6"> <label>Nom </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="nom" type="text" size="50" value="<?php echo $cmsData['nom'] ?>"></div>
                                        <div class="col-md-6"> <label>Prénom </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="prenom" type="text" size="50" value="<?php echo $cmsData['prenom'] ?>"></div>
                                        <div class="col-md-6"> <label>Spécialité </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="spe" type="text" size="50" value="<?php echo $cmsData['spe'] ?>"></div>
                                        <div class="col-md-6"> <label>Salle </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="salle" type="text" size="50" value="<?php echo $cmsData['salle'] ?>"></div>
                                        <div class="col-md-6"> <label>Téléphone </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="tel" type="text" size="50" value="<?php echo $cmsData['tel'] ?>"></div>
                                        <div class="col-md-6"> <label>Mail </label></div>
                                        <div class="col-md-6" style="left:-200px;"><input name="mail" type="text" size="50" value="<?php echo $cmsData['mail'] ?>"></div>
                                    </div>
                        <?php  }
                            } else {
                                echo '<div class="row" style="padding-left:50px;">';
                                echo '<div class="col-md-6"> <label>Nom  </label></div> <div class="col-md-6" style="left:-200px;"><input id="nom" type="text" placeholder="Nom" size="50"></div>';
                                echo '<div class="col-md-6"> <label>Prénom  </label></div> <div class="col-md-6" style="left:-200px;"><input id="prenom" type="text" placeholder="Prénom" size="50" ></div>';
                                echo '<div class="col-md-6"> <label>Spécialité  </label></div> <div class="col-md-6" style="left:-200px;"><input id="spe" type="text" placeholder="Spécialité" size="50"></div>';
                                echo '<div class="col-md-6"> <label>Salle  </label></div> <div class="col-md-6" style="left:-200px;"><input id="salle" type="text" placeholder="Salle" size="50"></div>';
                                echo  '<div class="col-md-6"> <label>Téléphone  </label></div> <div class="col-md-6" style="left:-200px;"><input id="tel" type="text" placeholder="Téléphone" size="50"></div>';
                                echo '<div class="col-md-6"> <label>Mail  </label></div> <div class="col-md-6" style="left:-200px;"><input id="mail" type="text" placeholder="Mail" size="50"></div>';
                                echo  '</div>';
                            }
                        }
                        ?>


                        <div class="row justify-content-around" style="padding-top:30px;">
                            <div class="col-4"> <input type="submit" value="Ajouter CV"> </div>
                            <div class="col-4"> <input type="file" name="imagefile"></div>
                        </div>


                        <div class="container" style="padding-top:50px; margin-left:-70px;">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">

                                        <?php

                                        $selected = "";
                                        if (isset($_POST['choix'])) {
                                            if (!empty($_POST['selector'])) {
                                                $selected = $_POST['selector'];
                                            }
                                        }
                                        $query = $con->query("SELECT * from medecins where nom='" . $selected . "'");


                                        if ($query->num_rows > 0) {
                                            $cmsData = $query->fetch_assoc();
                                            echo '
                                            <thead>
                                            <tr align="center">
                                                <th scope="col"></th>
                                                <th scope="col">Lundi</th>
                                                <th scope="col">Mardi</th>
                                                <th scope="col">Mercredi</th>
                                                <th scope="col">Jeudi</th>
                                                <th scope="col">Vendredi</th>
                                                <th scope="col">Samedi</th>
                                            </tr>
                                        </thead>
                                            
                                            <tbody align="center">
                                            <tr>
                                                <td>
                                                    AM
                                                </td>
                                                <td> ';

                                            if ($cmsData['lundiam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="LundiAM" id="LundiAM" checked>
                                            <label class="custom-control-label" for="LundiAM">
                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="LundiAM"  id="LundiAM">
                                            <label class="custom-control-label" for="LundiAM">
                                        </div>';
                                            }


                                            echo  '</td>
                                                 <td>';
                                            if ($cmsData['mardiam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="MardiAM" id="MardiAM" checked>
                                                                <label class="custom-control-label" for="MardiAM">
                                                                </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="MardiAM" id="MardiAM">
                                                                <label class="custom-control-label" for="MardiAM">
                                                                </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['mercrediam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="MercrediAM" id="MercrediAM" checked>
                                                        <label class="custom-control-label" for="MercrediAM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="MercrediAM" id="MercrediAM">
                                                        <label class="custom-control-label" for="MercrediAM">
                                                        </div>';
                                            }
                                            echo '</td>
                                            <td>';
                                            if ($cmsData['jeudiam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="JeudiAM" id="JeudiAM" checked>
                                                        <label class="custom-control-label" for="JeudiAM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="JeudiAM" id="JeudiAM">
                                                        <label class="custom-control-label" for="JeudiAM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['vendrediam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="VendrediAM" id="VendrediAM" checked>
                                                        <label class="custom-control-label" for="VendrediAM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="VendrediAM" id="VendrediAM">
                                                        <label class="custom-control-label" for="VendrediAM">
                                                        </div>';
                                            }
                                            echo '</td>
                                            <td>';
                                            if ($cmsData['samediam'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="SamediAM"  id="SamediAM" checked>
                                                        <label class="custom-control-label" for="SamediAM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="SamediAM"  id="SamediAM">
                                                        <label class="custom-control-label" for="SamediAM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                           

                                        </tr>
                                        <tr>
                                            <td>
                                                PM
                                            </td>
                                            <td>';
                                            if ($cmsData['lundipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="LundiPM" id="LundiPM" checked>
                                                        <label class="custom-control-label" for="LundiPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="LundiPM" id="LundiPM">
                                                        <label class="custom-control-label" for="LundiPM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['mardipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="MardiPM"  id="MardiPM" checked>
                                                        <label class="custom-control-label" for="MardiPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="MardiPM"  id="MardiPM">
                                                        <label class="custom-control-label" for="MardiPM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['mercredipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"name="MercrediPM"  id="MercrediPM" checked>
                                                        <label class="custom-control-label" for="MercrediPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="MercrediPM"  id="MercrediPM">
                                                        <label class="custom-control-label" for="MercrediPM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['jeudipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="JeudiPM" id="JeudiPM" checked>
                                                        <label class="custom-control-label" for="JeudiPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="JeudiPM" id="JeudiPM">
                                                        <label class="custom-control-label" for="JeudiPM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['vendredipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="VendrediPM"  id="VendrediPM" checked>
                                                        <label class="custom-control-label" for="VendrediPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="VendrediPM" id="VendrediPM">
                                                        <label class="custom-control-label" for="VendrediPM">
                                                        </div>';
                                            }
                                            echo '  </td>
                                            <td>';
                                            if ($cmsData['samedipm'] == 1) {

                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="SamediPM" id="SamediPM" checked>
                                                        <label class="custom-control-label" for="SamediPM">
                                                        </div>';
                                            } else {
                                                echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="SamediPM" id="SamediPM">
                                                        <label class="custom-control-label" for="SamediPM">
                                                        </div>';
                                            }
                                        }
                                        echo '  </td>'; ?>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="row align-items-start" style="padding-top:50px;">
                            <div class="col"> <input type="submit" value="Supprimer" name="supr"> </div>
                            <div class="col"> <input type="submit" value="Ajouter" name="aj"> </div>
                            <div class="col"> <input type="submit" value="Mettre à jour" name="maj"> </div>
                        </div>
                </form>
            </div>
        </div>



        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="row" style="padding-left:50px;">
                <div class="col-md-6"> <label>Nom du laboratoire</label></div>
                <div class="col-md-6" style="left:-200px;"><input name="nomlab" type="text" size="50" value=""></div>
                <div class="col-md-6"> <label>Salle</label></div>
                <div class="col-md-6" style="left:-200px;"><input name="sallelab" type="text" size="50" value=""></div>
                <div class="col-md-6"> <label>Télephone </label></div>
                <div class="col-md-6" style="left:-200px;"><input name="tellab" type="text" size="50" value=""></div>
                <div class="col-md-6"> <label>Email </label></div>
                <div class="col-md-6" style="left:-200px;"><input name="mail" type="text" size="50" value=""></div>
            </div>


        </div>
        <div class="tab-pane fade" id="stat" role="tabpanel" aria-labelledby="stat-tab">

            <?php

            $sql4 = "SELECT * from medecins";
            $sql5 = "SELECT * from labo";
            $sql6 = "SELECT * from clientinf";
            $sql7 = "SELECT * from rdv";
            $sql8 = "SELECT * from rdv_labo";

            if ($nbm = mysqli_query($con, $sql4)) {
                $nbmed = mysqli_num_rows($nbm);
            }

            if ($nbl = mysqli_query($con, $sql5)) {
                $nblab = mysqli_num_rows($nbl);
            }

            if ($nbc = mysqli_query($con, $sql6)) {
                $nbclient = mysqli_num_rows($nbc);
            }

            if ($nbr = mysqli_query($con, $sql7)) {
                $nbrdv = mysqli_num_rows($nbr);
            }

            if ($nbrl = mysqli_query($con, $sql8)) {
                $nbrdvl = mysqli_num_rows($nbrl);
            }

            $nbrdvtot = $nbrdvl + $nbrdv;


            echo '
                             
        
        <div class="row" style="padding-left:50px;">
                                        <div class="col-md-6"> <label>Nombre de médecins actuellement</label></div>
                                        <div class="col-md-6" style="left:-200px;"><label>' . $nbmed . '</label></div>
                                        <div class="col-md-6"> <label>Nombre de labo actuellement</label></div>
                                        <div class="col-md-6" style="left:-200px;"><label>' . $nblab . '</label></div>
                                        <div class="col-md-6"> <label>Nombre de clients actuellement</label></div>
                                        <div class="col-md-6" style="left:-200px;"><label>' . $nbclient . '</label></div>
                                        <div class="col-md-6"> <label>Nombre de rdv actuellement</label></div>
                                        <div class="col-md-6" style="left:-200px;"><label>' . $nbrdvtot . '</label></div>
                               
                                    </div>
        </div>';

            ?>

            <?php

            // RECUPERER INFO DOCTEURS 

            if (isset($_POST['aj'])) {

                if (!empty($_POST['nom'])) {
                    $name = $_POST['nom'];
                }
                if (!empty($_POST['prenom'])) {
                    $prenom = $_POST['prenom'];
                }
                if (!empty($_POST['tel'])) {
                    $tel = $_POST['tel'];
                }
                if (!empty($_POST['salle'])) {
                    $salle = $_POST['salle'];
                }
                if (!empty($_POST['mail'])) {
                    $mail = $_POST['mail'];
                }
                if (!empty($_POST['spe'])) {
                    $spe = $_POST['spe'];
                }

                // RECUPERER EMPLOI DU TEMPS 

                if (isset($_POST['LundiAM'])) {
                    $LundiAM = 1;
                } else $LundiAM = 0;
                if (isset($_POST['MardiAM'])) {
                    $MardiAM = 1;
                } else $MardiAM = 0;
                if (isset($_POST['MercrediAM'])) {
                    $MercrediAM = 1;
                } else $MercrediAM = 0;
                if (isset($_POST['JeudiAM'])) {
                    $JeudiAM = 1;
                } else $JeudiAM = 0;
                if (isset($_POST['VendrediAM'])) {
                    $VendrediAM = 1;
                } else $VendrediAM = 0;
                if (isset($_POST['SamediAM'])) {
                    $SamediAM = 1;
                } else $SamediAM = 0;
                if (isset($_POST['LundiPM'])) {
                    $LundiPM = 1;
                } else $LundiPM = 0;
                if (isset($_POST['MardiPM'])) {
                    $MardiPM = 1;
                } else $MardiPM = 0;
                if (isset($_POST['MercrediPM'])) {
                    $MercrediPM = 1;
                } else $MercrediPM = 0;
                if (isset($_POST['JeudiPM'])) {
                    $JeudiPM = 1;
                } else $JeudiPM = 0;
                if (isset($_POST['VendrediPM'])) {
                    $VendrediPM = 1;
                } else $VendrediPM = 0;
                if (isset($_POST['SamediPM'])) {
                    $SamediPM = 1;
                } else $SamediPM = 0;

                // RECUPERER IMAGE DOCTEUR 

                if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
                    echo "echec image";
                } else {
                    $image = $_FILES['imagefile']['tmp_name'];
                    $image = base64_encode(file_get_contents(addslashes($image)));
                }

                $requete1 = $con->query("INSERT INTO medecins(`nom`, `prenom`, `spe`, `salle`, `tel`, `mail`, `photo`, `lundiam`, `lundipm`, `mardiam`, `mardipm`, `mercrediam`, `mercredipm`, `jeudiam`, `jeudipm`, `vendrediam`, `vendredipm`, `samediam`, `samedipm`) 
                VALUES  ('" . $name . "','" . $prenom . "','" . $spe . "','" . $salle . "','" . $tel . "','" . $mail . "','" . $image . "','" . $LundiAM . "','" . $LundiPM . "','" . $MardiAM . "','" . $MardiPM . "','" . $MercrediAM . "','" . $MercrediPM . "','" . $JeudiAM . "','" . $JeudiPM . "','" . $VendrediAM . "','" . $VendrediPM . "','" . $SamediAM . "','" . $SamediPM . "')");
            }


            // RECUPERER DONNEES DOCTEURS 

            if (isset($_POST['maj'])) {

                if (!empty($_POST['nom'])) {
                    $name = $_POST['nom'];
                }
                if (!empty($_POST['prenom'])) {
                    $prenom = $_POST['prenom'];
                }
                if (!empty($_POST['tel'])) {
                    $tel = $_POST['tel'];
                }
                if (!empty($_POST['salle'])) {
                    $salle = $_POST['salle'];
                }
                if (!empty($_POST['mail'])) {
                    $mail = $_POST['mail'];
                }
                if (!empty($_POST['spe'])) {
                    $spe = $_POST['spe'];
                }

                // RECUPERER EMPLOI DU TEMPS 

                if (isset($_POST['LundiAM'])) {
                    $LundiAM = 1;
                } else $LundiAM = 0;
                if (isset($_POST['MardiAM'])) {
                    $MardiAM = 1;
                } else $MardiAM = 0;
                if (isset($_POST['MercrediAM'])) {
                    $MercrediAM = 1;
                } else $MercrediAM = 0;
                if (isset($_POST['JeudiAM'])) {
                    $JeudiAM = 1;
                } else $JeudiAM = 0;
                if (isset($_POST['VendrediAM'])) {
                    $VendrediAM = 1;
                } else $VendrediAM = 0;
                if (isset($_POST['SamediAM'])) {
                    $SamediAM = 1;
                } else $SamediAM = 0;
                if (isset($_POST['LundiPM'])) {
                    $LundiPM = 1;
                } else $LundiPM = 0;
                if (isset($_POST['MardiPM'])) {
                    $MardiPM = 1;
                } else $MardiPM = 0;
                if (isset($_POST['MercrediPM'])) {
                    $MercrediPM = 1;
                } else $MercrediPM = 0;
                if (isset($_POST['JeudiPM'])) {
                    $JeudiPM = 1;
                } else $JeudiPM = 0;
                if (isset($_POST['VendrediPM'])) {
                    $VendrediPM = 1;
                } else $VendrediPM = 0;
                if (isset($_POST['SamediPM'])) {
                    $SamediPM = 1;
                } else $SamediPM = 0;


                // RECUPERER IMAGE DOCTEUR 

                if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
                    echo "echec image";
                } else {
                    $image = $_FILES['imagefile']['tmp_name'];
                    $image = base64_encode(file_get_contents(addslashes($image)));
                }

                $id = $con->query("SELECT * FROM medecins WHERE  mail='" . $mail . "'");
                if ($id->num_rows > 0) {
                    $cmsData = $id->fetch_assoc();
                    $res = $cmsData['id'];

                    $requete2 = $con->query("UPDATE `medecins` SET `nom`='" . $name . "',`prenom`='" . $prenom . "',`spe`='" . $spe . "',`salle`='" . $salle . "',`tel`='" . $tel . "',`mail`='" . $mail . "',`photo`='" . $image . "',`lundiam`='" . $LundiAM . "',
            `lundipm`='" . $LundiPM . "',`mardiam`='" . $MardiAM . "',`mardipm`='" . $MardiPM . "',`mercrediam`='" . $MercrediAM . "',`mercredipm`='" . $MercrediPM . "',`jeudiam`='" . $JeudiAM . "',`jeudipm`='" . $JeudiPM . "',`vendrediam`='" . $VendrediAM . "',`vendredipm`='" . $VendrediPM . "',
            `samediam`='" . $SamediAM . "',`samedipm`='" . $SamediPM . "' WHERE id=" . $res . " ");
                }
            }


            // DELETE  $sql = "DELETE FROM medecins WHERE mail=$mail";
            if (isset($_POST['supr'])) {

                if (!empty($_POST['mail'])) {
                    $mail = $_POST['mail'];
                }

                $del = $con->query("DELETE FROM medecins WHERE mail='" . $mail . "'");
            }


            ?>




        </div>



    </div>



    <?php include("footer.html"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>