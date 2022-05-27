<style><?php include 'style.css'; ?></style>

<!doctype html>
<html lang="fr">
  <head>
    <title>Tout Parcourir</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- The icon of the website. -->
      <link rel="icon" href="Images/logo.png"> 

      <script src="index.js"></script>
</head>

  <body>
<!-- NavBar -->
<?php include("header.php"); ?>


<main role="main">

  <br><br>
<div class="container marketing">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading" ><a href="medgenerale.php" style="color: blue;">Médecins généralistes</a></h2>
      <p class="lead">Contactez un médecin au plus vite.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto rounded-circle"  style="filter:drop-shadow(0 -3mm 4mm rgb(144, 144, 167));" src="Images/pexels-thirdman-5327584.jpg" alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Médecin spécialiste</h2>
      <p class="lead">Contactez un médecin spécialisé.</p>
      <ul style="color: blue;">
        <div id="col">
        <li> <a href="addictologie.php">Addictologie</li></a>
        <li> <a href="andrologie.php">Andrologie</li></a>
        <li> <a href="cardiologie.php">Cardiologie</li></a>
        <li> <a href="dermatologie.php">Dermatologie</li></a>
        <li> <a href="gastro.php">Gastro-Hépato-Entérologie</li></a>
        <li> <a href="gynecologie.php">Gynécologie</li></a>
        <li> <a href="ist.php">I.S.T.</li></a>
        <li> <a href="osteopathie.php">Ostéopathie</li></a>
      </div>
        </ul>
      
    </div>
    <div class="col-md-5 order-md-1">
      <img class="featurette-image img-fluid mx-auto rounded-circle"   style="filter:drop-shadow(0 -2mm 4mm rgb(144, 144, 167));" src="Images/surgery-g1e055170d_640.jpg" alt="Generic placeholder image">
    </div>
  </div>
<!-- A horizontal line. -->
<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><a href="labo.php" style="color: blue;">Laboratoire de biologie médicale </a></h2>
    <p class="lead">Informations sur notre laboratoire.</p>
  </div>
  <div class="col-md-5">
    <img class="featurette-image img-fluid mx-auto rounded-circle" style="filter:drop-shadow(5px 10px 4px rgb(144, 144, 167));" src="Images/laboratory-g87594d8b8_640.jpg" alt="Generic placeholder image">
  </div>

<?php include("footer.html"); ?>


    
</main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
  </body>
</html>