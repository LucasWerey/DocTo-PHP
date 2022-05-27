<style><?php include 'style.css'; ?></style>

<!doctype html>
<html lang="fr">

<head>
  <title>Mot de passe oublié</title>
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
<?php include("header.php"); ?>

  <a href="https://front.codes/" class="logo" target="_blank">
      <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
  </a>

  <div class="section">
    <div class="container" >
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form action="verificationmdp.php" method="POST">
                                            <h4 class="mb-4 pb-3">Mot de passe oublié</h4>
                                            <div class="form-group">
                                                <input type="email" id="logemail" name="logemail" class="form-style" placeholder="Email"
                                                autocomplete="off" required>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" id="logpass1" name="logpass1" class="form-style" placeholder="Nouveau mot de passe"
                                                autocomplete="off" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" id="logpass2" name="logpass2" class="form-style" placeholder="Réecrire le nouveau mot de passe"
                                                autocomplete="off" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <input type="submit" id="submit" class="btn mt-4" value="Changer le mot de passe">
                                            <?php if(isset($_GET['erreur'])){ 
                                                $err = $_GET['erreur'];
                                                if($err==1){
                                                    echo "<p style='color:red'>Le compte n'existe pas. <a href='compte.php'>Veuillez vous créer un compte.</a></p>";
                                                }elseif ($err==2){
                                                    echo "<p style='color:red'>Les mots de passe ne sont pas identiques</p>";
                                                }elseif ($err==3){
                                                    echo "<p style='color:red'>Utilisateur ou mots de passe vides</p>";
                                                }elseif ($err==4){
                                                    echo "<p style='color:red'>Les modifications ne se sont pas enregistrées</p>";
                                                }
                                            } ?>
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

<!--FOTTER-->
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
<script src="index.js"></script>
</body>

</html>