<?php

echo "<script src='index.js'>" 
 

$mysqli = new mysqli("172.26.0.3:3306", "db_user", "db_user_pass", "app_db");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    if($result = $mysqli->query($sql)){
        if ($result->num_rows > 0) {
            echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'
            while ($row = $result->fetch_row()) {
                
                echo '<div class="col-lg-4">
                <!-- Button -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup" style="font-size: large;">
                 Dr.'.$row["nommedecin"].'
               </button>
             
               <!-- Pop-up -->
                 <div id="popup" class="modal">
                 <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content">
                     <div class="modal-header">
                       <p> Dr.'.$row["nommedecin"].'</p>
                     </div>
                     <div class="modal-body">
                       <p><img src= '.$row["chemin"].'></p>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = "rendezvous.html";">Prendre un RDV</button>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Communiquer avec le médecin</button>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Voir son CV</button>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             '



            }
            echo '</div>'
        }
       
    
$mysqli->close();



    ?>