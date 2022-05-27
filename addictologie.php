<style><?php include 'style.css'; ?></style>
<!doctype html>
<html lang="fr">

<head>
  <title>Addictologie</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <!-- The icon of the website. -->
  <link rel="icon" href="Images/logo.png">

</head>

<body>
  <!-- NavBar -->
  <?php include("header.html"); ?>

  <div class="container marketing" style="padding-top:100px;">
    <div class="col">
      <div class="col-lg-offset-2 col-lg-15 ">
        <div class="row boxr">

        <!--Premier médecin-->
          <div class="col-lg-4">
            <div class="image">
              <img src="Images/DocteurH.svg" width="75%" class="image__img" />
              <div class="img_overlay">
                <p class="img_desc">
                  <a type="button" class="btn btn-primary openBtn1"
                    style="font-size: 0.8em; background-color: transparent;">Dr. Lucas Werey</a>
                </p>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <form action="rdv_med.php" method="POST">
                    <!--<input type = "submit" name="Nom" value = "Prendre un RDV" class="btn btn-secondary">-->
                    <input type="text" name="nom" value="Werey" style="opacity: 0;" >
                    <input class="btn btn-secondary" type="submit" value="Prendre un RDV">
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'cv.html';">Voir son CV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>

          <!--Deuxième médecin-->
          <!-- Button -->
          <div class="col-lg-4">
            <div class="image">
              <img src="Images/DocteurH.svg" class="image__img" />
              <div class="img_overlay">
                <p class="img_desc">
                  <a type="button" class="btn btn-primary openBtn2"
                    style="font-size:0.8em; background-color: transparent;">Dr. Octave Prevot</a>
                </p>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <form action="rdv_med.php" method="POST">
                    <!--<input type = "submit" name="Nom" value = "Prendre un RDV" class="btn btn-secondary">-->
                    <input type="text" name="nom" value="Prevot" style="opacity: 0;">
                    <input class="btn btn-secondary" type="submit" value="Prendre un RDV">
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'cv.html';">Voir son CV</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <?php include("footer.html"); ?>

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

</body>

</html>