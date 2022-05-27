<?php
session_start();

if (isset($_POST['h']) && isset($_POST['jour'])) {

  $_SESSION['new_hrdv'] = isset($_POST['h']) ? $_POST['h'] : "";
  $_SESSION['new_jourrdv'] = isset($_POST['jour']) ? $_POST['jour'] : "";
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Payement</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
</head>

<body>

<!--METTRE LE FORM-->
<form action='' method='POST'>
  <div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="row g-3">

      <div class="col-md-6">

        <span>Méthode de paiement</span>
        <div class="card">

          <div class="accordion" id="accordionExample">

            <div class="card">
              <div class="card-header p-0" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="d-flex align-items-center justify-content-between">

                      <span>Paypal</span>
                      <img src="https://i.imgur.com/7kQEsHU.png" width="30">

                    </div>
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <input type="text" class="form-control" placeholder="Mail Paypal">
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0">
                <h2 class="mb-0">
                  <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="d-flex align-items-center justify-content-between">

                      <span>Carte bleue</span>
                      <div class="icons">
                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                        <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                        <img src="https://i.imgur.com/35tC99g.png" width="30">
                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                      </div>

                    </div>
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body payment-card-body">

                  <div>
                    <input type="radio" id="visa" name="carte" value="Visa" checked>
                    <label><img src="https://i.imgur.com/W1vtnOV.png" width="30"></label>

                    <input type="radio" id="mastercard" name="carte" value="MasterCard">
                    <label><img src="https://i.imgur.com/2ISgYja.png" width="30"></label>

                    <input type="radio" id="stripe" name="carte" value="Stripe">
                    <label><img src="https://i.imgur.com/35tC99g.png" width="30"></label>
                  </div>
                  
                    <span class="font-weight-normal card-text">Numéro de carte bleue</span>
                    <div class="input">

                      <i class="fa fa-credit-card"></i>
                      <input type="text" class="form-control" placeholder="0000 0000 0000 0000" required>

                    </div>

                    <div class="row mt-3 mb-3">

                      <div class="col-md-6">

                        <span class="font-weight-normal card-text">Date d'expiration</span>
                        <div class="input">

                          <i class="fa fa-calendar"></i>
                          <input type="text" class="form-control" placeholder="MM/YY" required>

                        </div>

                      </div>


                      <div class="col-md-6">

                        <span class="font-weight-normal card-text">CVV</span>
                        <div class="input">

                          <i class="fa fa-lock"></i>
                          <input type="text" class="form-control" placeholder="000" required>

                        </div>

                      </div>


                    </div>

                    <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Votre transaction est sécurisée par P PLUS PRO e-commerce</span>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

      <div class="col-md-6">
        <span>Résumé de votre commande</span>

        <div class="card">

          <div class="d-flex justify-content-between p-3">

            <div class="d-flex flex-column">

              <span>Prix à payer<i class="fa fa-caret-down"></i></span>


            </div>

            <div class="mt-1">
              <sup class="super-price"># €</sup>

            </div>

          </div>

          <hr class="mt-0 line">

          <div class="p-3">

            <div class="d-flex justify-content-between mb-2">



            </div>

            <div class="d-flex">
              <p> Votre rendez-vous : </p>
              <ul>
                <li>Motif</li>
                <li>Date</li>
                <li>Heure</li>
                <li>Digicode</li>
                <li>Adresse</li>
                <li>Medecin</li>
              </ul>


            </div>


          </div>

          <hr class="mt-0 line">


          <div class="p-3 d-flex justify-content-between">

            <div class="d-flex flex-column">

              <span>Confirmer votre paiement</span>
              <small>After 30 days $9.59</small>

            </div>
            <span>$0</span>
          </div>


          <div class="p-3">
            <input type='submit' name="pay" class="btn btn-primary btn-block free-button" value='Valider votre paiement'>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  </form>

  <?php
          if (isset($_POST['pay'])) {
            $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

            $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $_SESSION['name'] . "'";
            $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
            $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
            $id_med = $row2['id'];

            //Ajoute le rdv à la table `rdv`
            $requete = "INSERT INTO `rdv`(`id_cl`, `id_med`, `date`, `heure`, `adresse`, `digicode`, `prix`) VALUES (" . $_SESSION['id_cl'] . "," . $id_med . ",'" . $_SESSION['new_jourrdv'] . "','" . $_SESSION['new_hrdv'] . "','37 Quai de Grenelle','456A7','25')";
            $result = mysqli_query($db, $requete) or die(mysqli_error($db));

            mysqli_close($db); // fermer la connexion

            //echo "<h2>Enregistrement réalisé avec succès</h2>";
            //IL FAUT ALLER VERS LA PAGE PAYEMENT
            echo "<script> location.replace('verifcompte.php'); </script>";
            //session_destroy();
          }
          ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>