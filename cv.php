<?php   
        include("header.php");
        //include 'style.css';
        // Create connection and select database 
        $name = isset($_POST["nom"]) ? $_POST["nom"] : "";
        $con = mysqli_connect('localhost', 'root', 'root', 'omnessante');
        $sql = "SELECT * FROM cv where nom= '".$name."'";
        $result = mysqli_query($con, $sql);
        $xml= new XMLWriter();
        $xml->openUri("cv.xml");
        $xml->startDocument('1.0', 'utf-8');
        $xml->startElement('CV');
        if($result->num_rows > 0)
        { 
            while ($row = mysqli_fetch_array($result))
               {

                $xml->startElement('cv');
                $xml->writeElement('specialite', $row['Specialite']);
                $xml->writeElement('diplome',$row['Diplomes']);
                $xml->writeElement('formation',$row['Formation']);
                $xml->writeElement('experience',$row['Experiences']);
                $xml->writeElement('nom',$row['Nom']);
                $xml->endElement();
           }              
        }
        else{ 
            echo 'Content not found....'; 
        }

        $xml->endElement();
        $xml->endElement();
        $xml->flush();

        //le fichier xml est au même niveau que le fichier PHP qui le manipule
        $fichier = 'cv.xml';
        $contenu = simplexml_load_file($fichier);
        foreach($contenu as $cv){
        echo '<br><br><br>
        <table class="aff_rdv">
            <th>
            Nom : '.$cv->nom.'<br> 
            </th>
            <tr>
            Specialite : '.$cv->specialite.'<br> 
            Diplome : '.$cv->diplome.'<br> 
            Formation : '.$cv->formation.' <br>
            Experience : '.$cv->experience.'<br>
            </tr></table>';
        }
        include("footer.html");
?>