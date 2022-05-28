<style><?php include 'style.css'; ?></style>

<!doctype html>
<html lang="fr">
  <head>
    <title>Dermatologie</title>
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

<div class="container marketing" style="padding-top:100px;">
    <div class="col">
      <div class="col-lg-offset-2 col-lg-15 ">
        <div class="row boxr">

          <?php $con = mysqli_connect('localhost', 'root', 'root', 'omnessante');
          $sql = 'SELECT * FROM medecins where spe= "Dermatologie"';
          $result = mysqli_query($con, $sql);
          $i = 1;

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="col-lg-4">
              <div class="image">
              <?php echo '<img src="data:image/jpeg;base64,' . $row['photo'] . '" width="75%" class="image__img "/> '; ?>
                <div class="img_overlay">
                  <p class="img_desc">
                    <!-- here i am creating a button to open a modal popup  -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['nom'] ?>">Dr. <?php echo $row['nom'] ?></button>
                  </p>
                </div>
              </div>
            </div>


            <!-- here i am creating a modal popup code......... -->
            <div id="myModal<?php echo $row['nom'] ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title">Dr. <?php echo $row['prenom'] . " " . $row['nom']; ?></h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php echo '<img src="data:image/jpeg;base64,' . $row['photo']. '" height="25%" width="25%" alt="IMG Bapt" "/>'; ?>
                    <div id="col" style="margin-top:50px; margin-bottom:50px;">
                      <p> Nom : <?php echo $row['nom']; ?></p>
                      <p> Prénom : <?php echo $row['prenom']; ?></p>
                      <p> Salle : <?php echo $row['salle']; ?></p>
                      <p> Téléphone : <?php echo $row['tel']; ?></p>
                      <p> E-mail : <?php echo $row['mail']; ?></p>
                      <p> Spécialité : <?php echo $row['spe']; ?></p>
                    </div>
                    <?php echo '<table class="table table-bordered results">
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
                    if ($row['lundiam'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['mardiam'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['mercrediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['jeudiam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['vendrediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['samediam'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    echo '</tr>
          <tr>
            <th scope="row">PM</th>';
                    if ($row['lundipm'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['mardipm'] == true) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['mercredipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['jeudipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['vendredipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    if ($row['samedipm'] == 1) {
                      echo '<td bgcolor="white"></td>';
                    } else {
                      echo '<td bgcolor="black"></td>';
                    }
                    echo '</tr>
        </tbody>
      </table>';  ?>
                  </div>


                  <div class="modal-footer">
                    <form action="rdv_med.php" method="POST">
                      <!--<input type = "submit" name="Nom" value = "Prendre un RDV" class="btn btn-secondary">-->
                      <input type="text" name="nom" value="<?php echo $row['nom']; ?>" style="opacity: 0;">
                      <input class="btn btn-secondary" type="submit" value="Prendre un RDV">
                    </form>
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

      </div>
    </div>
  
  <?php include("footer.html"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>