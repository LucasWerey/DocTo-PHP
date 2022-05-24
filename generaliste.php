<?php
/*
echo '<script src="index.js"></script>';

if(!empty($_GET['id'])){
  // connexion à la base de données
  $db_username = 'root';
  $db_password = 'root';
  $db_name     = 'omnessante';
  $db_host     = 'localhost';


  $db_handle = mysqli_connect($db_host,  $db_username,  $db_password );
  $db_found = mysqli_select_db($db_handle, $db_name);
 
  if ($db_found) {
    $sql = "SELECT * FROM medecins where id={$_GET['id']}";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
    echo '<h5>''ID: ' . $data['id'] . '</h5>''<br>';    
    echo '<h5>''Prénom:' . $data['prenom'] . '</h5>''<br>';
    echo '<h5>''Nom:' . $data['nom'] . '<br>';
    echo '<h5>''Spécialité: ' . $data['spe'] .'</h5>' '<br>';
    echo '<h5>''Téléphone: ' . $data['tel'] . '</h5>''<br>';
    echo '<h5>''Mail: ' . $data['mail'] . '</h5>''<br>';
    echo '<h5>''Photo: ' . $data['photo'] . '</h5>''<br>';
    echo'<h5>' 'Salle: ' . $data['salle'] .'</h5>' '<br>';
}
  }
    else {
        echo "Database not found";
       }
       mysqli_close($db_handle);
    }
*/


if(!empty($_GET['id'])){ 
    // Database configuration 
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'omnessante';
    $db_host     = 'localhost'; 
     
    // Create connection and select database 
    $db = new mysqli($db_host, $db_username, $db_password, $db_name); 
     
    if ($db->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $db->query("SELECT * FROM medecins WHERE id = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
      //  echo '<p>'.$cmsData['photo'].'</p>'; 
        echo '<img src="data:image/jpeg;base64,' . base64_encode($cmsData['photo']) . '" height="50%" width="50%" alt="IMG Bapt" style="margin-left:200px;"/>';
        echo '<p> Nom : '.$cmsData['nom'].'</p>'; 
        echo '<p> Prénom : '.$cmsData['prenom'].'</p>'; 
        echo '<p> Salle : '.$cmsData['salle'].'</p>'; 
        echo '<p> Téléphone : '.$cmsData['tel'].'</p>'; 
        echo '<p> E-mail : '.$cmsData['mail'].'</p>'; 
    
    }else{ 
        echo 'Content not found....'; 
    } 
}else{ 
    echo 'Content not found....'; 
} 
?>
   