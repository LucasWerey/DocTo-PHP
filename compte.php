<!doctype html>
<html lang="fr">

<head>
  <title>Votre Compte</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- The icon of the website. -->
  <link rel="icon" href="Images/logo.png">

</head>

<body>
  <!-- NavBar -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="acceuil.html"><img src="Images/logo.png" width="20%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="acceuil.html">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="toutParcourir.html">Tout Parcourir</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="rendezvous.html">Rendez-vous </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="compte.php">Votre Compte<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2 " type="text" placeholder="Votre recherche" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
        </form>
      </div>
    </nav>
  </header>

  <a href="https://front.codes/" class="logo" target="_blank">
    <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
  </a>

  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Connexion</span><span>S'inscrire</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">

                      <form action="verification.php" method="POST">
                        <h4 class="mb-4 pb-3">Connexion</h4>
                        <div class="form-group">
                          <input type="email" id="logemail" name="logemail" class="form-style" placeholder="Email"
                            autocomplete="off" required>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" id="logpass" name="logpass" class="form-style" placeholder="Mot de passe"
                           autocomplete="off" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input type="submit" id="submit" class="btn mt-4" value="Se connecter">
                        <?php 
                            if(isset($_GET['erreur'])){ 
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2)
                                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                            }
                        ?>
                      </form>

                      <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Mot de passe oublié?</a></p>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">S'inscrire</h4>
                      <div class="form-group">
                        <input type="text" name="logname" class="form-style" placeholder="Prénom et Nom" id="logname"
                          autocomplete="off">
                        <i class="input-icon uil uil-user"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail"
                          autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Mot de passe" id="logpass"
                          autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <a href="#" class="btn mt-4">S'inscrire</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container marketing">

    <!-- A horizontal line. -->
    <hr class="featurette-divider">

  </div>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p1> Contact OMNES Santé </p1>
    <p> Mail: <a href="mailto:contact@omnessante.fr">contact@omnessante.fr</a>
      &emsp;Téléphone: +33 1.69.42.36.80&emsp;Adresse:
      <a
        href="https://www.google.fr/maps/place/37+Quai+de+Grenelle,+75015+Paris/@48.8515039,2.2850437,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6700497ee3ec5:0xdd60f514adcdb346!8m2!3d48.8515004!4d2.2872324">37
        Quai de Grenelle 75015
      </a>
    </p>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>