<style>
  <?php include 'style.css'; ?>
</style>

<!doctype html>
<html lang="en">

<head>
  <title>Services Laboratoire</title>
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
          $sql = 'SELECT * FROM services_labo';
          $result = mysqli_query($con, $sql);
          $i = 1;

          while ($row = mysqli_fetch_array($result)) {
              $id_labo = $row['Idlabo'];
              $service = $row['service'];
              $sql_labo='SELECT * FROM `labo` WHERE `Idlabo`='.$id_labo;
              $result_labo=mysqli_query($con, $sql_labo);
              $row_labo=mysqli_fetch_array($result_labo);
              if($row_labo[$service] == "1"){
          ?>
            <div class="col-lg-4">
              <div class="image">
                <?php echo '<img src="Images/laboratory-g87594d8b8_640.jpg" width="75%" class="image__img "/> '; ?>
                <div class="img_overlay">
                  <p class="img_desc">
                    <!-- here i am creating a button to open a modal popup  -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['Idlabo'].$row['service'] ?>"><?php 
                    if ($row['service'] == "covid"){
                        echo "Dépistage Covid"; 
                    }elseif ($row['service'] == "bio_prev"){
                        echo "Biologie préventive";
                    }elseif ($row['service'] == "bio_enc"){
                        echo "Biologie de la femme enceinte";
                    }elseif ($row['service'] == "bio_rout"){
                        echo "Biologie de routine";
                    }elseif ($row['service'] == "cancer"){
                        echo "Cancérologie";
                    }elseif ($row['service'] == "gyneco"){
                        echo "Gynécologie";
                    }
                    ?></button>
                  </p>
                </div>
              </div>
            </div>


            <!-- here i am creating a modal popup code......... -->
            <div id="myModal<?php echo $row['Idlabo'].$row['service'] ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title"><?php 
                    if ($row['service'] == "covid"){
                        echo "Dépistage Covid"; 
                    }elseif ($row['service'] == "bio_prev"){
                        echo "Biologie préventive";
                    }elseif ($row['service'] == "bio_enc"){
                        echo "Biologie de la femme enceinte";
                    }elseif ($row['service'] == "bio_rout"){
                        echo "Biologie de routine";
                    }elseif ($row['service'] == "cancer"){
                        echo "Cancérologie";
                    }elseif ($row['service'] == "gyneco"){
                        echo "Gynécologie";
                    } 
                    ?></h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php echo '<img src="Images/laboratory-g87594d8b8_640.jpg" height="25%" width="25%" alt="IMG Bapt" "/>'; ?>
                    <div style="margin-top:50px; margin-bottom:50px;">
                    <?php 
                    if ($row['service'] == "covid"){
                        echo "<h5>La stratégie du triptyque Tester-Alerter–Protéger (T.A.P) doit continuer de s’appliquer :</h5>
                        <p>Je me fais tester en priorité en cas de signes de la maladie ou si je suis identifié comme personne contact. Ainsi, je permets aux laboratoires de se concentrer sur les personnes prioritaires.</p>
                        <p>Je communique la liste de tous mes contacts récents à mon médecin traitant et à l’Assurance maladie si j’ai un test positif, pour qu’ils soient alertés rapidement. Ainsi, je participe à freiner la propagation du virus.</p>
                        <p>Je protège les autres en respectant les règles d'isolement et de quarantaine, selon ma situation.</p>"; 
                    }elseif ($row['service'] == "bio_prev"){
                        echo "<h5>1) Identifier le bilan adapté pour vous</h5>
                        <p>Des bilans pour prévenir les effets du vieillissement, optimiser votre capital santé ou explorer les causes de certains symptômes.</p>
                        <h5>2) Trouver votre laboratoire</h5>
                        <p>Notre réseau de laboratoires Omnessanté vous accompagne dans la meilleure utilisation de la gamme OmnesPredix.</p>
                        <h5>3) Recevoir & interpréter les résultats</h5>
                        <p>Obtenez des recommandations à partir de l'interprétation de vos résultats grâce à nos experts OmnesPredix et/ou votre prescripteur.</p>
                        <h5>4) Evaluer l'effet thérapeutique</h5>
                        <p>En fonction de vos résultats, des recommandations médicales ou nutritionnelles seront mises en place avec votre prescripteur.</p>";
                    }elseif ($row['service'] == "bio_enc"){
                        echo "<h5>1) Connaître votre statut immunitaire</h5>
                        <p>Pour savoir si vous êtes immunisée vis-à-vis de certains micro-organismes, notamment la toxoplasmose et la rubéole.</p>
                        <h5>2) Dépister des pathologies</h5>
                        <p>pré-existantes ou infections qui pourraient survenir pendant votre grossesse, afin de prévenir les risques pour vous et votre enfant.</p>
                        <h5>3) Confirmer le diagnostic</h5>
                        <p>D'autres examens peuvent être prescrits si vous présentez certains symptômes (douleurs, démangeaisons ...).</p>
                        <h5>4) Préparer l'accouchement</h5>
                        <p>Un bilan vous sera prescrit par l'anesthésiste avant l'accouchement pour s'assurer qu'il se passera dans les meilleures conditions.</p>";
                    }elseif ($row['service'] == "bio_rout"){
                        echo "<p>Il s’agit d’examens couramment prescrits pour la surveillance simple de la santé ou lors du suivi d’un traitement : biochimie clinique, bactériologie par culture des germes, tests d’hémostase, hématologie, sérologies fréquentes, hormonologie, marqueurs de cancers tumoraux, des anémies, de souffrance cardiaque.</p>
                        <ul><li>Hématologie de routine</li>
                        <li>Hémostase de routine</li>
                        <li>La biochimie de routine</li>
                        <li>Chromatographie et électrophorèses</li>
                        <li>Microbiologie humaine</li></ul>";
                    }elseif ($row['service'] == "cancer"){
                        echo "<h4>En cancérologie, le laboratoire est au coeur du parcours de soins du patient et présent à toutes les étapes : dépistage, diagnostic et suivi de la maladie.</h4>
                        <h5>1) Dépistage</h5>
                        <p>PSA, HPV, recherche de sang dans les selles…nous réalisons tous les bilans sanguins permettant de détecter une anomalie.</p>
                        <h5>2) Diagnostic</h5>
                        <p>Après la réalisation de vos examens, nos biologistes sont disponibles pour l'interprétation des résultats.</p>
                        <h5>3) Suivi du traitement</h5>
                        <p>Avec un bilan sanguin, nous apprécions la tolérance au traitement et son efficacité en suivant les marqueurs tumoraux spécifiques.</p>
                        <h5>4) Détection des rechutes</h5>
                        <p>Nous vous accompagnons après le traitement, en diagnostic précoce grâce à un ensemble d'examens réalisés en surveillance.</p>";
                    }elseif ($row['service'] == "gyneco"){
                        echo "<h4>En France, hors grossesse, le suivi gynécologique n’est pas obligatoire. Il est pourtant recommandé de consulter régulièrement son médecin, un gynécologue ou une sage-femme, et de participer aux campagnes de dépistage organisé.</h4>
                        <h5>Le frottis</h5>
                        <p>Comment ça se passe ? L’examen est réalisé par un médecin généraliste, un gynécologue ou une sage-femme. Après la mise en place d’un spéculum dans le vagin, un prélèvement superficiel de cellules est effectué au niveau du col de l’utérus à l’aide d’une petite brosse ou d’une spatule. Placé sur une plaque de microscope, le prélèvement sera ensuite analysé par un laboratoire.</p>
                        <h5>La mammographie</h5>
                        <p>Comment ça se passe ? L’examen s’effectue dans un centre de radiologie agréé. Le radiologue réalise une palpation des seins puis deux radios de chaque sein. A l’issue de l’examen, une première interprétation est possible mais dans le cadre du dépistage organisé, les clichés seront interprétés par un second médecin pour confirmer le diagnostic.</p>
                        <h5>Le dépistage des IST (Infections sexuellement transmissibles)</h5>
                        <p>Comment ça se passe ? Deux types de dépistage peuvent être proposés :
                        <ul><li>Une prise de sang, qui permet de rechercher les anticorps dans le sang</li>
                        <li>Un frottis vaginal permettant de rechercher le germe après une mise en culture du prélèvement.</li></ul></p>";
                    } 
                    ?>
                    </div>
                  </div>


                  <div class="modal-footer">
                    <form action="rdv_labo.php" method="POST">
                      <!--<input type = "submit" name="Nom" value = "Prendre un RDV" class="btn btn-secondary">-->
                      <input type="hidden" name="service" value="<?php echo $row['service']; ?>" style="opacity: 0;">
                      <input type="hidden" name="Idlabo" value="<?php echo $row['Idlabo']; ?>" style="opacity: 0;">
                      <input class="btn btn-secondary" type="submit" value="Prendre un RDV">
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