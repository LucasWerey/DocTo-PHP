<style><?php include 'style.css'; ?></style>
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
        echo '<img src="data:image/jpeg;base64,' . base64_encode($cmsData['photo']) . '" height="25%" width="25%" alt="IMG Bapt" style="margin-left:200px;"/>';
        echo '<p> Nom : '.$cmsData['nom'].'</p>'; 
        echo '<p> Prénom : '.$cmsData['prenom'].'</p>'; 
        echo '<p> Salle : '.$cmsData['salle'].'</p>'; 
        echo '<p> Téléphone : '.$cmsData['tel'].'</p>'; 
        echo '<p> E-mail : '.$cmsData['mail'].'</p>';
        echo '<table class="table table-bordered results">
        <thead>
          <tr>
            <th></th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">AM</th>';
            if ($cmsData['lundiam']==true){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['mardiam']==true){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['mercrediam']==1){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['jeudiam']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
            if ($cmsData['vendrediam']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
            if ($cmsData['samediam']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
            echo'</tr>
          <tr>
            <th scope="row">PM</th>';
            if ($cmsData['lundipm']==true){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['mardipm']==true){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['mercredipm']==1){
                echo '<td bgcolor="white"></td>';
            }else{
                echo '<td bgcolor="black"></td>';
            }
            if ($cmsData['jeudipm']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
            if ($cmsData['vendredipm']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
            if ($cmsData['samedipm']==1){
                echo'<td bgcolor="white"></td>';
            }else{
                echo'<td bgcolor="black"></td>';
            }
          echo '</tr>
        </tbody>
      </table>'; 
    
    }else{ 
        echo 'Content not found....'; 
    } 
}else{ 
    echo 'Content not found....'; 
} 
?>