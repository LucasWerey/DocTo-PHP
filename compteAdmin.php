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

                        <option value="">Choisir un médecin</option>
                        <?php
                        $res = 'SELECT * FROM medecins order by nom asc';
                        $nom = mysqli_query($con, $res);

                        while ($row1 = mysqli_fetch_array($nom)) {
                            echo '<option value=' . $row1['nom'] . '>' . $row1['prenom'] . ' ' . $row1['nom'] . '</option>';
                        }
                        ?>

                    </select>

                    <input type="submit" name="submit" value="Voir">
                </form>

                <div class="container-marketing" style="padding-left:220px;">




                    <?php
                    if (isset($_POST['submit'])) {
                        if (!empty($_POST['selector'])) {
                            $selected = $_POST['selector'];


                            $query = $con->query("SELECT * from medecins where nom='" . $selected . "'");

                            if ($query->num_rows > 0) {
                                $cmsData = $query->fetch_assoc();
                    ?>

                                <div class="row" style="padding-left:50px;">
                                    <div class="col-md-6"> <label>Nom </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['nom'] ?>"></div>
                                    <div class="col-md-6"> <label>Prénom </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['prenom'] ?>"></div>
                                    <div class="col-md-6"> <label>Spécialité </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['spe'] ?>"></div>
                                    <div class="col-md-6"> <label>Salle </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['salle'] ?>"></div>
                                    <div class="col-md-6"> <label>Téléphone </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['tel'] ?>"></div>
                                    <div class="col-md-6"> <label>Mail </label></div>
                                    <div class="col-md-6" style="left:-200px;"><input type="text" size="50" value="<?php echo $cmsData['mail'] ?>"></div>
                                </div>
                    <?php  }
                        } else {
                            echo '<div class="row" style="padding-left:50px;">';
                            echo '<div class="col-md-6"> <label>Nom  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Prénom" size="50"></div>';
                            echo '<div class="col-md-6"> <label>Prénom  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Nom" size="50" ></div>';
                            echo '<div class="col-md-6"> <label>Spécialité  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Spécialité" size="50"></div>';
                            echo '<div class="col-md-6"> <label>Salle  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Salle" size="50"></div>';
                            echo  '<div class="col-md-6"> <label>Téléphone  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Téléphone" size="50"></div>';
                            echo '<div class="col-md-6"> <label>Mail  </label></div> <div class="col-md-6" style="left:-200px;"><input type="text" placeholder="Mail" size="50"></div>';
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
                                            <th scope="col">Dimanche</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <tr>
                                            <td>
                                                AM
                                            </td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">
                                                </div></td>
                                                <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">
                                                </div></td>
                                                <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">
                                                </div></td>
                                          
                                        </tr>
                                        <tr>
                                            <td>
                                               PM
                                            </td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                    <label class="custom-control-label" for="customCheck8">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                    <label class="custom-control-label" for="customCheck9">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                    <label class="custom-control-label" for="customCheck10">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                    <label class="custom-control-label" for="customCheck11">
                                                </div></td>
                                                <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                    <label class="custom-control-label" for="customCheck12">
                                                </div></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                    <label class="custom-control-label" for="customCheck13">
                                                </div></td>
                                                <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                    <label class="custom-control-label" for="customCheck14">
                                                </div></td>
                                          
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row align-items-start" style="padding-top:50px;">
                        <div class="col"> <input type="submit" value="Supprimer"> </div>
                        <div class="col"> <input type="submit" value="Ajouter"> </div>
                        <div class="col"> <input type="submit" value="Mettre à jour"> </div>
                    </div>

                </div>
            </div>



            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p> yo </p>
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