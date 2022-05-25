
<style><?php include 'style.css'; ?></style>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="Images/logo.png"> 
</head>
  <body>

   <!-- NavBar -->
   <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-green">
      <a class="navbar-brand" href="acceuil.php"><img src="Images/logo.png" width="20%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="acceuil.php">Accueil</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="toutParcourir.php">Tout Parcourir <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="rendezvous.php">Rendez-vous </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="verifcompte.php">Votre Compte</a>
          </li>
            </li>
        </ul>
        <form action="search.php" method="GET" class="form-inline mt-2 mt-md-0" style="padding-right: 100px">
          <input type = "text" name = "terme" class="form-control mr-sm-2" placeholder="Votre recherche" aria-label="Search">
          <input type = "submit" name = "s" value = "Rechercher" class="btn btn-outline-success my-2 my-sm-0">
          </form>
      </div>
    </nav>
  </header>

  <div class="container marketing"  style="padding-top:150px;">
  <div class="col">
      <div class="col-lg-offset-2 col-lg-15 ">
          <div class="row boxr">
    <div class="col-lg-4">
     <img src="Images/Docteur H.svg" width="70%" class="rounded-circle" style=" border : solid black 2px; filter: blur(2px);" />
<div class="overlay ctr">
     <button type="button" class="btn1 btn-default1" data-toggle="modal" data-target="#exampleModal" data-whatever="Lucas Werey">Lucas Werey
</div>
    </button>
</div><div class="col-lg-4">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Clémence Amaladasse">Dr.Clémence Amaladasse</button>
</div><div class="col-lg-4">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Léna Heurtaux">Dr.Léna Heurtaux</button>
</div><div class="col-lg-4">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Octave Prevot">Dr.Octave Prevot</button>
</div><div class="col-lg-4">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Matthieu Vu-Huy-Dat">Dr.Matthieu Vu-Huy-Dat</button>
</div><div class="col-lg-4">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Baptiste Bernaud">Dr. Baptiste Bernaud</button>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
         
        </form>
      </div>
      
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'rendezvous.php';">Prendre un RDV</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voir son CV</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
           
        </div>
     
    </div>
  </div>
</div>
</div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>