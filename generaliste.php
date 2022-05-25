<?php

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