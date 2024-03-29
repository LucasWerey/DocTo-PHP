
<style><?php include 'style.css'; ?></style>


<!doctype html>
<html lang="en">
  <head>
    <title>Compte Médecin</title>
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
     

        while ($row = mysqli_fetch_array($result)) {
         if($result->num_rows > 0)
         { 
           if($row['conn']==1){
        echo '<form class="form-inline mt-2 mt-md-0" style="margin-right:-70px;">
          <a href="deconn.php"><img src="Images/deco.png" width="20%"></a>
        </form>';}
         }}
        ?>
      </div>
    </nav>
  </header>

<!------ DOCTOR FORM ---------->
<?php 

$qry = $con->query("SELECT * from compte where conn=1"); 
  
if($qry->num_rows>0)
{ 
  $res = $qry->fetch_assoc(); 
  $username=$res['username'];

}


$query = $con->query("SELECT * from medecins where mail='".$username."'"); 

if($query->num_rows > 0){ 
$cmsData = $query->fetch_assoc(); 


?>


<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" >
                        <?php echo '<img src="data:image/jpeg;base64,' .$cmsData['photo'] . '" width="75%" /> '; ?>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $cmsData['prenom'].' '.$cmsData['nom']; ?>
                                    </h5>
                                   
                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Votre profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vos rendez-vous</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row" style="margin-top:-120px">
                                            <div class="col-md-6">
                                                <label>Votre identifiant</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $cmsData['id']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['nom']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prénom</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['prenom']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Spécialité</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['spe']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['mail']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Téléphone</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['tel']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Salle</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $cmsData['salle']; ?></p>
                                            </div>
                                        </div>
                                       
                            </div> <?php } ?>


                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row" style="margin-top:-120px">
                                            <!--<div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>-->
                                            <h5><a href="rdv_med.php">Pour consulter vos rendez-vous à venir, rendez vous sur cette page.</a></h5>
                                        </div>
                                        <!--<div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>-->
                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>


       
        <?php include("footer.html"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>