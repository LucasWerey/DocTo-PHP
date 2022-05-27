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
                        </ul>
                    </div>
                </div>
            </div>

        </form>


        <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="" method="post">
                    <select name="selector">

                        
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
                            <div class="col-4"> <input type="file" name="Ajouter Photo"></div>
                        </div>


                        <div class="container" style="padding-top:50px; margin-left:-70px;">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">
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
                                                <td> <?php

                                                        $selected="";
                                                        if (isset($_POST['choix'])) {
                                                            if (!empty($_POST['selector'])) {
                                                                $selected = $_POST['selector'];
                                                            }
                                                        }
                                                        $query = $con->query("SELECT * from medecins where nom='" . $selected . "'");


                                                        if ($query->num_rows > 0) {
                                                            $cmsData = $query->fetch_assoc();

                                                            if ($cmsData['lundiam'] == 1) {

                                                                echo '<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="LundiAM" checked>
                                            <label class="custom-control-label" for="LundiAM">
                                        </div>';
                                                            } else {
                                                                echo '<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="LundiAM">
                                            <label class="custom-control-label" for="LundiAM">
                                        </div>';
                                                            }
                                                        

                                                        echo  '</td>
                                                 <td>';
                                                        if ($cmsData['mardiam'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="MardiAM" checked>
                                                                <label class="custom-control-label" for="MardiAM">
                                                                </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="MardiAM">
                                                                <label class="custom-control-label" for="MardiAM">
                                                                </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['mercrediam'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MecrediAM" checked>
                                                        <label class="custom-control-label" for="MecrediAM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MecrediAM">
                                                        <label class="custom-control-label" for="MecrediAM">
                                                        </div>';
                                                        }
                                                        echo '</td>
                                            <td>';
                                                        if ($cmsData['jeudiam'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="JeudiAM" checked>
                                                        <label class="custom-control-label" for="JeudiAM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="JeudiAM">
                                                        <label class="custom-control-label" for="JeudiAM">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['vendrediam'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="VendrediAM" checked>
                                                        <label class="custom-control-label" for="VendrediAM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="VendrediAM">
                                                        <label class="custom-control-label" for="VendrediAM">
                                                        </div>';
                                                        }
                                                        echo '</td>
                                            <td>';
                                                        if ($cmsData['samediam'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="SamediAM" checked>
                                                        <label class="custom-control-label" for="SamediAM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="SamediAM">
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
                                                        <input type="checkbox" class="custom-control-input" id="LundiPm" checked>
                                                        <label class="custom-control-label" for="LundiPm">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="LundiPm">
                                                        <label class="custom-control-label" for="LundiPm">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['mardipm'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MardiPM" checked>
                                                        <label class="custom-control-label" for="MardiPM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MardiPM">
                                                        <label class="custom-control-label" for="MardiPM">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['mercredipm'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MercrediPM" checked>
                                                        <label class="custom-control-label" for="MercrediPM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="MercrediPM">
                                                        <label class="custom-control-label" for="MercrediPM">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['jeudipm'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="JeudiPM" checked>
                                                        <label class="custom-control-label" for="JeudiPM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="JeudiPM">
                                                        <label class="custom-control-label" for="JeudiPM">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['vendredipm'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="VendrediPM" checked>
                                                        <label class="custom-control-label" for="VendrediPM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="VendrediPM">
                                                        <label class="custom-control-label" for="VendrediPM">
                                                        </div>';
                                                        }
                                                        echo '  </td>
                                            <td>';
                                                        if ($cmsData['samedipm'] == 1) {

                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="SamediPM" checked>
                                                        <label class="custom-control-label" for="SamediPM">
                                                        </div>';
                                                        } else {
                                                            echo '<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="SamediPM">
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

                    </div>
            </div>

            </form>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <?php

                if (isset($_POST['aj'])) {

                    if (!empty($_POST['nom'])) {
                        $name = $_POST['nom'];
                        echo '<h5>' . $name . '</h5>';
                    }
                    if (!empty($_POST['prenom'])) {
                        $prenom = $_POST['prenom'];
                        echo '<h5>' . $prenom . '</h5>';
                    }
                    if (!empty($_POST['tel'])) {
                        $tel = $_POST['tel'];
                        echo '<h5>' . $tel . '</h5>';
                    }
                    if (!empty($_POST['salle'])) {
                        $salle = $_POST['salle'];
                        echo '<h5>' . $salle . '</h5>';
                    }
                    if (!empty($_POST['mail'])) {
                        $mail = $_POST['mail'];
                        echo '<h5>' . $mail . '</h5>';
                    }
                    if (!empty($_POST['spe'])) {
                        $spe = $_POST['spe'];
                        echo '<h5>' . $spe . '</h5>';
                    }
                    
                }

                // DELETE  $sql = "DELETE FROM medecins WHERE mail=$mail";
                // INSERT $sql ="INSERT INTO medecins values()

               
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