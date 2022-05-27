
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="icon" href="Images/logo.png">
  <link rel="stylesheet" href="style.css">
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
          <li class="nav-item active">
            <a class="nav-link" href="toutParcourir.php">Tout Parcourir <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="rdv_med.php">Rendez-vous </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="verifcompte.php">Votre Compte</a>
          </li>
          </li>
        </ul>
        <form action="search.php" method="GET" class="form-inline mt-2 mt-md-0" style="padding-right: 100px">
          <input type="text" name="terme" class="form-control mr-sm-2" placeholder="Votre recherche" aria-label="Search">
          <input type="submit" name="s" value="Rechercher" class="btn btn-outline-success my-2 my-sm-0">
        </form>
      </div>
    </nav>
  </header>


  <div class="container marketing" style="padding-top:100px;">
  
 
   
      <?php $con = mysqli_connect('localhost', 'root', 'root', 'omnessante');
      $sql = 'SELECT * FROM medecins where spe= "Generaliste"';
      $result = mysqli_query($con, $sql);
      $i = 1;

      while ($row = mysqli_fetch_array($result)) {
      ?>

            <!-- here i am creating a button to open a modal popup  -->
	    	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['nom'] ?>">Dr. <?php echo $row['nom'] ?></button>
      

    
                 
                <!-- here i am creating a modal popup code......... -->
        <div id="myModal<?php echo $row['nom'] ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title">Dr. <?php echo $row['nom'] . " " . $row['prenom']; ?></h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '" height="25%" width="25%" alt="IMG Bapt" style="margin-left:200px;"/>'; ?>
                <p> Nom :<?php echo $row['nom']; ?></p>
                <p> Prénom : <?php echo $row['prenom']; ?></p>
                <p> Salle : <?php echo $row['salle']; ?></p>
                <p> Téléphone :<?php echo $row['tel']; ?></p>
                <p> E-mail : <?php echo $row['mail']; ?></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'rendezvous.php';">Prendre un RDV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voir son CV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
        

       

        <!--  // end modal popup code........ -->
      <?php
        $i++;
      }
      
      ?>
    
    </div>






    <!--
    <div class="col">
      <div class="col-lg-offset-2 col-lg-15 ">
        <div class="row boxr">
          <div class="col-lg-4">
            <div class="image">
              <img src="Images/DocteurH.svg" width="70%" class="image__img" />
              <div class="img_overlay">
                <p class="img_desc">

                  <a data-toggle="modal" data-target="#exampleModal" data-whatever="Lucas Werey">Lucas Werey </a>
                </p>
              </div>
            </div>
          </div>


          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">


                

                    echo '<img src="data:image/jpeg;base64,' . base64_encode($cmsData['photo']) . '" height="25%" width="25%" alt="IMG Bapt" style="margin-left:200px;"/>';
                    echo '<p> Nom : ' . $cmsData['nom'] . '</p>';
                    echo '<p> Prénom : ' . $cmsData['prenom'] . '</p>';
                    echo '<p> Salle : ' . $cmsData['salle'] . '</p>';
                    echo '<p> Téléphone : ' . $cmsData['tel'] . '</p>';
                    echo '<p> E-mail : ' . $cmsData['mail'] . '</p>';
                    echo '<table class="table table-bordered results">
        <thead>
          <tr>
            <th></th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">AM</th>';
                    if ($cmsData['lundiam'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['mardiam'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['mercrediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['jeudiam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['vendrediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['samediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    echo '</tr>
          <tr>
            <th scope="row">PM</th>';
                    if ($cmsData['lundipm'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['mardipm'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['mercredipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['jeudipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['vendredipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($cmsData['samedipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    echo '</tr>
        </tbody>
      </table> else {
                    echo 'Content not found....';
                  }

                  ?>
                  </form>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'rendezvous.php';">Prendre un RDV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voir son CV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div></div>-->
  
  <?php include("footer.html"); ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- <script src="index.js"></script>-->
</body>

</html>