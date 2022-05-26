<?php
    $rdv=isset($_POST['h']) ? $_POST['h'] : "";
    echo "<h2>".$rdv."</h2>";

    $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
    $requete = "SELECT * FROM `horaire`";
    $result = mysqli_query($db, $requete) or die(mysqli_error($db));
    
?>