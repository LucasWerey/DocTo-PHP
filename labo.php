<style>
  <?php include 'style.css'; ?>
</style>

<!doctype html>
<html lang="en">

<head>
  <title>Laboratoire</title>
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
  <?php include("header.php"); ?>

  <div class="container marketing" style="padding-top:100px;">
    <div class="col">
      <div class="col-lg-offset-2 col-lg-15 ">
        <div class="row boxr">

          <?php $con = mysqli_connect('localhost', 'root', 'root', 'omnessante');
          $sql = 'SELECT * FROM labo';
          $result = mysqli_query($con, $sql);
          $i = 1;

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="col-lg-4">
              <div class="image">
                <?php echo '<img src="Images\laboratory-g9743d72da_1280.jpg" width="75%" class="image__img "/> '; ?>
                <div class="img_overlay">
                  <p class="img_desc">
                    <!-- here i am creating a button to open a modal popup  -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['Idlabo'] ?>"><?php echo $row['Nom'] ?></button>
                  </p>
                </div>
              </div>
            </div>


            <!-- here i am creating a modal popup code......... -->
            <div id="myModal<?php echo $row['Idlabo'] ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title"><?php echo $row['Nom']; ?></h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php echo '<img src="Images\laboratory-g9743d72da_1280.jpg" height="70%" width="70%" alt="IMG Laboratory" "/>'; ?>
                    <div id="col" style="margin-top:50px; margin-bottom:50px;">
                      <p> Nom : <?php echo $row['Nom']; ?></p>
                      <p> Salle : <?php echo $row['Salle']; ?></p>
                      <p> Téléphone : <?php echo $row['Tel']; ?></p>
                      <p> E-mail : <?php echo $row['Email']; ?></p>
                    </div>
                  </div>


                  <div class="modal-footer">
                    <form action="services_labo.php" method="POST">
                      <!--<input type = "submit" name="Nom" value = "Prendre un RDV" class="btn btn-secondary">-->
                      <input type="text" name="nom" value="<?php echo $row['Nom']; ?>" style="opacity: 0;">
                      <input class="btn btn-secondary" type="submit" value="Nos services">
                    </form>

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
  </div>

    <?php include("footer.html"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>