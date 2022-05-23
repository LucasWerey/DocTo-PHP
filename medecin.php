<?php
    echo "<h1>Dans PHP</h1>";
    $choice = isset ($_POST['choice']) ? $_GET['title'] : '';
    // Connect to database server
    $link = mysqli_connect("localhost", "root", "root")
        or die("Impossible de se connecter : " . mysql_error());
    echo 'Connexion réussie';

	// Select database
	mysqli_select_db("omnessante") or die(mysql_error());

    if (isset($_POST["1"])){
        $sql = "SELECT * FROM medecins WHERE id=1";
        $result = mysqli_query($link,$sql);
        while($data = mysqli_fetch_assoc($result)){
            echo $data['nom']."<br>";
        }
        $result -> free_result();
    }

    mysql_close($link);
    
?>