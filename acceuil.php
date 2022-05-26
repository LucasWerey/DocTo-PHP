
<style><?php include 'style.css'; ?></style>

<!doctype html>
<html lang="fr">
  <head>
    <title>Omnes Santé</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- The icon of the website. -->
    <link rel="icon" href="Images/logo.png">

</head>
 <!-- https://getbootstrap.com/docs/4.0/examples/carousel/ -->
<body>
  
<header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-green">
          <a class="navbar-brand" href="acceuil.php"><img src="Images/logo.png" width="20%"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active ">
                <a class="nav-link" href="acceuil.php">Accueil <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="toutParcourir.php">Tout Parcourir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="rdv_med.php">Rendez-vous</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="verifcompte.php">Votre Compte</a>
              </li>
            </ul>
            <form action="search.php" method="GET" class="form-inline mt-2 mt-md-0" style="padding-right: 100px">
              <input type = "text" name = "terme" class="form-control mr-sm-2" placeholder="Votre recherche" aria-label="Search">
              <input type = "submit" name = "s" value = "Rechercher" class="btn btn-outline-success my-2 my-sm-0">
              </form>
          </div>
        </nav>
      </header>
    
    <main role="main">

      <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"> </li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="Images/doctor-g7a4ed3258_1280.jpg" alt="First slide">       
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="Images/laboratory-g9743d72da_1280.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="Images/teachers-g12dded464_1280.jpg" alt="Third slide">       
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="Images/DocteurF.svg" alt="Generic placeholder image" width="140" height="140">
            <h2>Clémence AMALADASSE</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="medgenerale.html" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="Images/DocteurH.svg" alt="Generic placeholder image" width="140" height="140">
            <h2>Lucas WEREY</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="medgenerale.html" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="Images/vecteezy_doctor-female-with-face-mask-isolated-icon_.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Léna HEURTAUX</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="medgenerale.html" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Le buletin santé de la semaine</h2>
            <p class="lead">Variole du singe : l’OMS estime que la propagation peut « être stoppée dans les pays non endémiques », notamment en Europe.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="Images/presentation-g7df8b028c_1280.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">
       
        <div class="container-fluide">
          <div class="row row-relative">
            <div class="col-sm">
              <h2>Omnes Santé :</h2>
            </div>
            <div class="col-sm">
              <h2>34 millions</h2>
              <p>de patients soignés</p>   
            </div>
            <div class="col-sm col-border">
              <div class="col-border-padding">
              <h2>120 000</h2>
              <p>soignants disponibles</p>  
            </div></div>
            <div class="col-sm col-border">
              <div class="col-border-padding">
              <h2>100%</h2>
              <p>de retours positifs</p>  
            </div></div>
          </div>
        </div>


        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Evénement de la semaine</h2>
            <p class="lead">Cette semaine nous célébrons les 10 ans de notre plateforme. Nous avons pu aider à soigner 34 millions de personnes. Merci à vous de nous faire confiance.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="Images/logo.png" alt="Generic placeholder image">
          </div>
        </div>

        <!--<hr class="featurette-divider">-->
        <!-- /END THE FEATURETTES -->
      </div><!-- /.container -->

      <?php include("footer.html"); ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

  </body>
 

   
</html>