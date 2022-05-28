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
                        </div>

                      </div>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body payment-card-body">

                    <div>
                      <input type="radio" id="visa" name="typecarte" value="Visa" checked>
                      <label><img src="https://i.imgur.com/W1vtnOV.png" width="30"></label>

                      <input type="radio" id="mastercard" name="typecarte" value="MasterCard">
                      <label><img src="https://i.imgur.com/2ISgYja.png" width="30"></label>

                      <input type="radio" id="stripe" name="typecarte" value="Stripe">
                      <label><img src="https://i.imgur.com/35tC99g.png" width="30"></label>
                    </div>

                    <span class="font-weight-normal card-text">Numéro de carte bleue</span>
                    <div class="input">

                      <i class="fa fa-credit-card"></i>
                      <?php
                      $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

                      $requete = "SELECT * FROM `banque` WHERE `IdClient`=" . $_SESSION['id_cl'];
                      $result = mysqli_query($db, $requete) or die(mysqli_error($db)); //infos du médecin cliqué
                      $nbrow = mysqli_num_rows($result); //tableau à 1 ligne

                      if ($nbrow > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<input type='text' name='numcard' class='form-control' value='" . 
                          $row['Num carte'] . "' placeholder='" . $row['Num carte'] . "' maxlength='16' minlength='16' required>";
                        }
                      } else {
                        echo '<input type="text" name="numcard" class="form-control" placeholder="0000 0000 0000 0000" maxlength="16" minlength="16" required>';
                      }
                      mysqli_close($db);
                      ?>


                    </div>

                    <div class="row mt-3 mb-3">

                      <div class="col-md-6">

                        <span class="font-weight-normal card-text">Date d'expiration</span>
                        <div class="input">

                          <i class="fa fa-calendar"></i>
                          <?php
                          $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

                          $requete = "SELECT * FROM `banque` WHERE `IdClient`=" . $_SESSION['id_cl'];
                          $result = mysqli_query($db, $requete) or die(mysqli_error($db)); //infos du médecin cliqué
                          $nbrow = mysqli_num_rows($result); //tableau à 1 ligne
                          if ($nbrow > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                              echo '<input type="text" name="exp" class="form-control" value="' . $row['Exp'] . '" placeholder="' 
                              . $row['Exp'] . '" maxlength="5" minlength="5" required>';
                            }
                          } else {
                            echo '<input type="text" name="exp" class="form-control" placeholder="MM/YY" maxlength="5" minlength="5" required>';
                          }
                          mysqli_close($db);
                          ?>

                        </div>

                      </div>


                      <div class="col-md-6">

                        <span class="font-weight-normal card-text">CVV</span>
                        <div class="input">

                          <i class="fa fa-lock"></i>
                          <?php
                          $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');

                          $requete = "SELECT * FROM `banque` WHERE `IdClient`=" . $_SESSION['id_cl'];
                          $result = mysqli_query($db, $requete) or die(mysqli_error($db)); //infos du médecin cliqué
                          $nbrow = mysqli_num_rows($result); //tableau à 1 ligne
                          if ($nbrow > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                              echo '<input type="text" name="cvv" class="form-control" value="' . $row['CVV'] . '" placeholder="' 
                              . $row['CVV'] . '" maxlength="3" minlength="3" required>';
                            }
                          } else {
                            echo '<input type="text" name="cvv" class="form-control" placeholder="000" maxlength="3" minlength="3" required>';
                          }
                          mysqli_close($db);
                          ?>

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
          <span>Votre rendez-vous</span>

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

    $requete = "SELECT * FROM `banque` WHERE `IdClient`=" . $_SESSION['id_cl'];
    $result = mysqli_query($db, $requete) or die(mysqli_error($db)); //infos du médecin cliqué
    $nbrow = mysqli_num_rows($result); //tableau à 1 ligne

    //$db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
    $info_client = "SELECT * FROM `clientinf` WHERE `IdCl`=" . $_SESSION['id_cl'];
    $result_infocl = mysqli_query($db, $info_client) or die(mysqli_error($db));
    $ligne_infocl = mysqli_fetch_array($result_infocl);
    $nom_cl = $ligne_infocl['Nom'];

    if ($nbrow == 0) {
      
      $typecarte = isset($_POST["typecarte"]) ? $_POST["typecarte"] : "";
      $numcard = isset($_POST["numcard"]) ? $_POST["numcard"] : "";
      $exp = isset($_POST["exp"]) ? $_POST["exp"] : "";
      $cvv = isset($_POST["cvv"]) ? $_POST["cvv"] : "";

      $ajout_carte = "INSERT INTO `banque`(`IdClient`, `typecarte`, `Num carte`, `Nom`, `Exp`, `CVV`) VALUES (" . $_SESSION['id_cl'] .
        ",'" . $typecarte . "','" . $numcard . "','" . $nom_cl . "','" . $exp . "','" . $cvv . "')";
      $result_ajout_carte = mysqli_query($db, $ajout_carte) or die(mysqli_error($db)); //infos du médecin cliqué
    }

    $requete2 = "SELECT * FROM `medecins` WHERE `nom`='" . $_SESSION['name'] . "'";
    $result2 = mysqli_query($db, $requete2) or die(mysqli_error($db)); //infos du médecin cliqué
    $row2 = mysqli_fetch_array($result2); //tableau à 1 ligne
    $id_med = $row2['id'];
    $spe_med = $row2['spe'];
    $prix = "";
    if ($spe_med == "Generaliste") {
      $prix = '30';
    } elseif ($spe_med == "Addictologie") {
      $prix = '60';
    } elseif ($spe_med == "Andrologie") {
      $prix = '25';
    } elseif ($spe_med == "Cardiologie") {
      $prix = '51';
    } elseif ($spe_med == "Dermatologie") {
      $prix = '45';
    } elseif ($spe_med == "Gastro") {
      $prix = '60';
    } elseif ($spe_med == "Gynecologie") {
      $prix = '80';
    } elseif ($spe_med == "IST") {
      $prix = '55';
    } elseif ($spe_med == "Osteopathie") {
      $prix = '58';
    }

    //Ajoute le rdv à la table `rdv`
    $requete = "INSERT INTO `rdv`(`id_cl`, `id_med`, `date`, `heure`, `adresse`, `digicode`, `prix`) VALUES (" . $_SESSION['id_cl'] . "," . $id_med . ",'" . $_SESSION['new_jourrdv'] . "','" . $_SESSION['new_hrdv'] . "','37 Quai de Grenelle','456A7','" . $prix . "')";
    $result = mysqli_query($db, $requete) or die(mysqli_error($db));




    // ENVOIE DU MAIL 

    $to = 'lucas.werey@edu.ece.fr';
    $subject="test";
    $message="message";
   
    if (mail($to,$subject,$message)) // Envoi du message
    {
        echo 'Votre message a bien été envoyé ';
    }
    else // Non envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }


    mysqli_close($db); // fermer la connexion

    //echo "<h2>Enregistrement réalisé avec succès</h2>";
  //  echo "<script> location.replace('verifcompte.php'); </script>";
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