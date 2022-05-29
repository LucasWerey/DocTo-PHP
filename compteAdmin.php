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



    <div class="container emp-profile">
        <form action="" method="post" enctype="multipart/form-data">



            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="IconesDocteurs/work-time.png" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">

                        <?php

                        echo '<h5> COMPTE ADMINISTRATEUR </h5>
             

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
<div class="row">
<div class="col-md-4">
  
</div>
<div class="col-md-8">
  <div class="tab-content profile-tab" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row" style="margin-top:-140px;">'; ?>
                        <div class="col-md-6">
                            <!-- SELECTOR BOX FOR DOCTORS -->
                            <select name="selector" style="margin-bottom:20px" ;>


                                <?php
                                $res = 'SELECT * FROM medecins order by nom asc';
                                $nom = mysqli_query($con, $res);

                                while ($row1 = mysqli_fetch_array($nom)) {
                                    echo '<option value=' . $row1['nom'] . '>' . $row1['prenom'] . ' ' . $row1['nom'] . '</option>';
                                }
                                ?>

                            </select> <input type="submit" name="choix" value="Voir">
                        </div>

                        <?php
                        $selected = "AMALADASSE";
                        if (isset($_POST['choix'])) {
                            if (!empty($_POST['selector'])) {
                                $selected = $_POST['selector'];
                            }
                        }

                        $query = $con->query("SELECT * from medecins where nom='" . $selected . "'");


                        if ($query->num_rows > 0) {
                            $cmsData = $query->fetch_assoc();
                        ?>

                            <div class="col-md-6">
                            </div>
                            <?php
                            echo '     <div class="col-md-6">
                          <label>Nom</label>
                      </div>
                      <div class="col-md-6">
                      <input type="text" value="' . $cmsData['nom'] . '" name="nom" size=35></input>
                      <input name="id" type="hidden" value = "' . $cmsData['id'] . '">  </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Prénom</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="' . $cmsData['prenom'] . '" name="prenom" size=35></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Spécialité</label>
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" value="' . $cmsData['spe'] . '"  name="spe" size=35></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Salle</label>
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" value="' . $cmsData['salle'] . '"  name="salle" size=35></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Téléphone</label>
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" value="' . $cmsData['tel'] . '"  name="tel" size=35></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mail</label>
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" value="' . $cmsData['mail'] . '"  name="mail" size=35></input>
                                    </div>
                                    </div>';

                                    $info_cv = $con->query("SELECT * FROM cv WHERE Nom='" . $selected . "'");
                                    if ($info_cv->num_rows > 0) {
                                        $cvinfo = $info_cv->fetch_assoc();
                                    
                                  echo '<div class="row">
                                        <div class="col-md-6">
                                            <label> Diplomes (CV) </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="'.$cvinfo['Diplomes'].'" name="diplome" size=35>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> Formation (CV) </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="'.$cvinfo['Formation'].'" name="formation" size=35>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> Experience (CV) </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="'.$cvinfo['Experiences'].'" name="experience" size=35>
                                        </div>
                                    </div> '; 
                                    } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Image de profil </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="imagefile">
                                </div>
                            </div>

</form>
                            <div class="row justify-content-around" style="padding-top:30px;">
                                <div class="col-4">
                                   
        
    </div>


    <div class="container" style="padding-top:50px; margin-left:-70px;">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <?php

                            $selected = "Amaladasse";
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
        <td style="font-weight:bold;">
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
<td style="font-weight:bold;">
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



<?php
                        }  ?>

</div>

</div>


</form>


<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row" style="margin-top:-140px">

        <div class="col-md-6">

            <!-- SELECTOR BOX FOR LABS -->

            <form action="" method="post">
                <select name="selectorlab">


                    <?php
                    $reslab = 'SELECT * FROM labo order by Nom asc';
                    $nomlab = mysqli_query($con, $reslab);

                    while ($row2 = mysqli_fetch_array($nomlab)) {
                        echo '<option value="' . $row2['Nom'] . '"> ' . $row2['Nom'] . '</option>';
                    }
                    ?>


                </select>

                <input type="submit" name="choixlab" value="Voir">
            </form>

        </div>
        <div class="col-md-6"></div>



        <?php
        $selectedlab = "laboratoire de grenelle";
        if (isset($_POST['choixlab'])) {
            if (!empty($_POST['selectorlab'])) {
                $selectedlab = $_POST['selectorlab'];
            }
        }


        $query2 = $con->query("SELECT * from labo where Nom='" . $selectedlab . "'");

        if ($query2->num_rows > 0) {
            $cmsData2 = $query2->fetch_assoc();


            echo   ' <div class="col-md-6">
                    <label>Nom du laboratoire</label>
                </div>
                <div class="col-md-6">
                    <input type="text" value="' . $cmsData2['Nom'] . '" size=35></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Salle du laboratoire</label>
                </div>
                <div class="col-md-6">
                <input type="text" value="' . $cmsData2['Salle'] . '" size=35></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Téléphone</label>
                </div>
                <div class="col-md-6">
                <input type="text" value="' . $cmsData2['Tel'] . '" size=35></input>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>E-mail</label>
                </div>
                <div class="col-md-6">
                <input type="text" value="' . $cmsData2['Email'] . '" size=35></input>
                </div>';
        } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>



<?php
    /*AJOUTE PAR CLEM*/    
    $diplomes=isset($_POST['diplome']) ? $_POST['diplome'] : "";
    $formations=isset($_POST['formation']) ? $_POST['formation'] : "";
    $experiences=isset($_POST['experience']) ? $_POST['experience'] : "";
    /*FIN AJOUTE PAR CLEM*/

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
    if (!empty($_POST['spe'])) {
        $spe = $_POST['spe'];
    }

    $mail = $prenom.".".$name."@omnessante.fr";
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
            VALUES  ('" . $name . "','" . $prenom . "','" . $spe . "','" . $salle . "','" . $tel . "','" . $mail . "','" . $image . "','" . $LundiAM . "','" . $LundiPM . "','" . $MardiAM . "','" . $MardiPM . "','" . $MercrediAM . "','" . $MercrediPM 
            . "','" . $JeudiAM . "','" . $JeudiPM . "','" . $VendrediAM . "','" . $VendrediPM . "','" . $SamediAM . "','" . $SamediPM . "')");
                
//{}

        $req_idmed="SELECT * FROM medecins WHERE nom='".$name."'";
        $res_idmed=mysqli_query($con,$req_idmed);
        $row_idmed = mysqli_fetch_array($res_idmed);
        $id_med=$row_idmed['id'];
        $requete_cv = $con->query("INSERT INTO `cv`(`ID`, `Specialite`, `Diplomes`, `Formation`, `Experiences`, `Nom`) VALUES (".
        $id_med.",'".$spe."','".$diplomes."','".$formations."','".$experiences."','".$name."')");

        $req_compte= $con->query("INSERT INTO `compte`(`username`, `password`, `type`, `conn`) VALUES (
            '".$mail."','".$prenom."','medecin',0)");
        
    echo "<script> location.replace('CompteAdmin.php'); </script>";
}


// RECUPERER DONNEES DOCTEURS 

if (isset($_POST['maj'])) {

    if (!empty($_POST['id'])) {
        $identifiant = $_POST['id'];
    }
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

    $requete2 = $con->query("UPDATE `medecins` SET `nom`='" . $name . "',`prenom`='" . $prenom . "',`spe`='" . $spe . "',`salle`='" . $salle . "',`tel`='" . $tel . "', `photo`='" . $image . "',`lundiam`='" . $LundiAM . "',
        `lundipm`='" . $LundiPM . "',`mardiam`='" . $MardiAM . "',`mardipm`='" . $MardiPM . "',`mercrediam`='" . $MercrediAM . "',`mercredipm`='" . $MercrediPM . "',`jeudiam`='" . $JeudiAM . "',`jeudipm`='" . $JeudiPM . "',`vendrediam`='" . $VendrediAM . "',`vendredipm`='" . $VendrediPM . "',
        `samediam`='" . $SamediAM . "',`samedipm`='" . $SamediPM . "' WHERE id='" . $identifiant . "'");

    $requete_updatecv = $con->query("UPDATE `cv` SET `Specialite`='".$spe."'
    ,`Diplomes`='".$diplomes."',`Formation`='".$formations."',`Experiences`='".$experiences."',`Nom`='".$name."' WHERE `ID`=".$identifiant);


    echo "<script> location.replace('CompteAdmin.php'); </script>";
}


// DELETE  $sql = "DELETE FROM medecins WHERE mail=$mail";
if (isset($_POST['supr'])) {

    if (!empty($_POST['id'])) {
        $iden = $_POST['id'];
    }
    if (!empty($_POST['mail'])) {
        $mail = $_POST['mail'];
    }

    $del = $con->query("DELETE FROM medecins WHERE id='" . $iden . "'");
    $delr = $con->query("DELETE FROM rdv WHERE id='" . $iden . "'");
    $delcv = $con->query("DELETE FROM cv WHERE ID=" . $iden);
    $delcompte = $con->query("DELETE FROM compte WHERE username='" . $mail ."'");

    echo "<script> location.replace('CompteAdmin.php'); </script>";
}

mysqli_close($con);

?>

<!--FOTTER-->
<?php include("footer.html"); ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
