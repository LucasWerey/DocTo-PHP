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
        <!--detail de la commande-->
        <div class="col-md-6">
          <span>Résumé de votre commande</span>
          <div class="card">
            <div class="d-flex justify-content-between p-3">
              <div class="d-flex flex-column">
                <span>Prix à payer<i class="fa fa-caret-down"></i></span>
              </div>
              <div class="mt-1">
                <?php
                $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
                $req = "SELECT * FROM `labo` WHERE `Idlabo`='" . $_SESSION['Idlabo'] . "'";
                $res = mysqli_query($db, $req);
                $row = mysqli_fetch_array($res);
                $nom = $row['Nom'];
                $service = $_SESSION['service'];
                $date = $_SESSION['new_jourrdv'];
                $heure = $_SESSION['new_hrdv'];
                $prix = "";
                if ($_SESSION['service'] == "covid") {
                  $prix = '44';
                  $service = "Dépistage covid";
                } elseif ($_SESSION['service'] == "bio_prev") {
                  $prix = '140';
                  $service = "Biologie préventive";
                } elseif ($_SESSION['service'] == "bio_enc") {
                  $prix = '43';
                  $service = "Biologie de la femme enceinte";
                } elseif ($_SESSION['service'] == "bio_rout") {
                  $prix = '21';
                  $service = "Biologie de routine";
                } elseif ($_SESSION['service'] == "cancer") {
                  $prix = '32';
                  $service = "Cancérologie";
                } elseif ($_SESSION['service'] == "gyneco") {
                  $prix = '80';
                  $service = "Gynécologie";
                }

                echo '<sup class="super-price">' . $prix . ' €</sup>
              </div>
            </div>
            <hr class="mt-0 line">
            <div class="p-3">
              <div class="d-flex justify-content-between mb-2">
              </div>
              <div class="d-flex">
                <p> Votre rendez-vous : </p>
                <ul style="margin-right:-10px">
                <li>Laboratoire : ' . $nom . '</li>
                  <li>Service : ' . $service . '</li>
                  <li>Date : ' . ucfirst($date) . '</li>
                  <li>Heure : ' . $heure . '</li>
                  <li>Digicode : 456A7</li>
                  <li>Adresse : 37 Quai de Grenelle</li>
                </ul>
              </div>
            </div>
            <hr class="mt-0 line">
            <div class="p-3 d-flex justify-content-between">
              <div class="d-flex flex-column">
                <span>Confirmer votre paiement</span>
                <!--<small>After 30 days $9.59</small>-->

              </div>
              <span>' . $prix . ' €</span>';
                ?>
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

    $typecarte = isset($_POST["typecarte"]) ? $_POST["typecarte"] : "";
    $numcard = isset($_POST["numcard"]) ? $_POST["numcard"] : "";
    $exp = isset($_POST["exp"]) ? $_POST["exp"] : "";
    $cvv = isset($_POST["cvv"]) ? $_POST["cvv"] : "";

    if ($nbrow == 0) {
      $ajout_carte = "INSERT INTO `banque`(`IdClient`, `typecarte`, `Num carte`, `Nom`, `Exp`, `CVV`) VALUES (" . $_SESSION['id_cl'] .
        ",'" . $typecarte . "','" . $numcard . "','" . $nom_cl . "','" . $exp . "','" . $cvv . "')";
      $result_ajout_carte = mysqli_query($db, $ajout_carte) or die(mysqli_error($db)); //infos du médecin cliqué
    } else {
      $update_carte = "UPDATE `banque` SET `typecarte`='" . $typecarte . "',
      `Num carte`='" . $numcard . "',`Nom`='" . $nom_cl . "',`Exp`='" . $exp . "',`CVV`='"
        . $cvv . "' WHERE `IdClient`=" . $_SESSION['id_cl'];
      $result_updatecard = mysqli_query($db, $update_carte) or die(mysqli_error($db)); //infos du médecin cliqué
    }

    $prix = "";
    if ($_SESSION['service'] == "covid") {
      $prix = '44';
    } elseif ($_SESSION['service'] == "bio_prev") {
      $prix = '140';
    } elseif ($_SESSION['service'] == "bio_enc") {
      $prix = '43';
    } elseif ($_SESSION['service'] == "bio_rout") {
      $prix = '21';
    } elseif ($_SESSION['service'] == "cancer") {
      $prix = '32';
    } elseif ($_SESSION['service'] == "gyneco") {
      $prix = '80';
    }

    //Ajoute le rdv à la table `rdv_labo`
    $requete = "INSERT INTO `rdv_labo`(`id_cl`, `id_labo`,`service` , `date`, `heure`, `adresse`, `digicode`, `prix`) VALUES (" . $_SESSION['id_cl'] . "," . $_SESSION['Idlabo'] . ",'"
      . $_SESSION['service'] . "','" . $_SESSION['new_jourrdv'] . "','" . $_SESSION['new_hrdv'] . "','37 Quai de Grenelle','456A7','" . $prix . "')";
    $result = mysqli_query($db, $requete) or die(mysqli_error($db));

    // ENVOIE DU MAIL 
    $to = 'cinomnes@gmail.com';
    $subject = "Lorem Ipsum";
    $message = "Hi, Lorem Ipsum?";
    $from = 'lucas.werey@edu.ece.fr';

    // Pour envoyer du courrier HTML, l'en-tête Content-type doit être défini.
    $headers = "MIME-Version: 1.0" . "rn";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn";

    // Créer les en-têtes de courriel
    $headers .= 'From: ' . $from . "rn" .
      'Reply-To: ' . $from . "rn" .
      'X-Mailer: PHP/' . phpversion();

    // Composer un simple message électronique HTML
    $message = "<html><body>";
    $message .= '<h1>Bonjour # vous avez pris un rendez-vous chez OmnesSanté</h1>';
    $message .= '<p>Lorem ipsum dolor sit amet</p>';
    $message .= '</body></html>';

    // Envoi d'email
    if (mail($to, $subject, $message, $headers)) {
      echo 'Votre message a été envoyé avec succès.';
    } else {
      echo 'Mail non envoyé.';
    }

    mysqli_close($db); // fermer la connexion

    echo "<script>alert('Payement réalisé avec succès.');</script>";

    //echo "<h2>Enregistrement réalisé avec succès</h2>";
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