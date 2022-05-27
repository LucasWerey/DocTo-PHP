<?php
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<CV>";         
        // Create connection and select database 
        $name = isset($_POST["nom"]) ? $_POST["nom"] : "";
        $con = mysqli_connect('localhost', 'root', 'root', 'omnessante');
        $sql = "SELECT * FROM cv where nom= '".$name."'";
        $result = mysqli_query($con, $sql);
            if($result->num_rows > 0)
            { 
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<cv>";
                    echo "<specialite>$row[Specialite]</specialite>";
                    echo "<diplome>$row[Diplomes]</diplome>";
                    echo "<formation>$row[Formation]</formation>";
                    echo "<experience>$row[Experiences]</experience>";
                    echo "<nom>$row[Nom]</nom>";
                    echo "</cv>"; 
                }              
            }
    else{ 
        echo 'Content not found....'; }
    echo "</CV>";
?>