<style>
  <?php include 'style.css'; ?>
</style>

<!doctype html>
<html lang="fr">

<head>
  <title>Votre Compte</title>
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
        //quand un utilisateur est connecte, la connexion passe a 1 dans la bdd
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

  <a href="https://front.codes/" class="logo" target="_blank">
    <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
  </a>
  <!--page de connexion/inscription-->
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
                          <input type="email" id="logemail" name="logemail" class="form-style" placeholder="Email" autocomplete="off" required>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" id="logpass" name="logpass" class="form-style" placeholder="Mot de passe" autocomplete="off" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <div class="form-group mt-2" style="margin-left:30px; padding-top:10px;">
                          <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input type="submit" id="submit" class="btn mt-4" value="Se connecter">
                        <?php
                        if (isset($_GET['erreur'])) {
                          $err = $_GET['erreur'];
                          if ($err == 1 || $err == 2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                        ?>
                      </form>

                      <p class="mb-0 mt-4 text-center"><a href="mdp.php" class="link">Mot de passe oublié?</a></p>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">

                      <form action="signin.php" method="POST">
                        <h4 class="mb-4 pb-3">S'inscrire</h4>
                        <div class="form-group">
                          <input type="text" name="logfname" class="form-style" placeholder="Nom" id="logfname" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logname" class="form-style" placeholder="Prénom" id="logname" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off" required>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logaddress1" class="form-style" placeholder="Adresse 1" id="logaddress1" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logaddress2" class="form-style" placeholder="Adresse 2" id="logaddress2" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logville" class="form-style" placeholder="Ville" id="logville" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logcp" class="form-style" placeholder="Code postale" id="logcp" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logpays" class="form-style" placeholder="Pays" id="logpays" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" name="logtel" class="form-style" placeholder="Téléphone" id="logtel" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="text" maxlength="13" minlength="13" name="logcartev" class="form-style" placeholder="Carte Vitale" id="logcartev" autocomplete="off" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="logpass" class="form-style" placeholder="Mot de passe" id="logpass" autocomplete="off" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input type="submit" id="inscrire" value="S'inscrire" class="btn mt-4">
                      </form>
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

  <br><br><br><br><br><br><br><br><br><br><br><br>

  <?php include("footer.html"); ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>