<!--https://code.tutsplus.com/fr/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931-->

<?php
session_start();
if (isset($_GET['logout'])) {

    //Message de sortie simple
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>" .
        $_SESSION['name_chat'] . "</b> a quitté la session de chat.</span><br></div>";


    $myfile = fopen(__DIR__ . "/log.html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/log.html");
    fwrite($myfile, $logout_message);
    fclose($myfile);
    session_destroy();
    sleep(1);
    header("Location: acceuil.php"); //Rediriger l'utilisateur
}
if (isset($_POST['enter'])) {
    if ($_POST['name_chat'] != "") {
        $_SESSION['name_chat'] = stripslashes(htmlspecialchars($_POST['name_chat']));
    } else {
        echo '<span class="error">Veuillez saisir votre nom</span>';
    }
}
function loginForm()
{
    echo
    '<div id="loginform">
 <p>Veuillez saisir votre nom pour continuer!</p>
 <form action="chat.php" method="post">
 <label for="name_chat">Nom: </label>
 <input type="text" name="name_chat" id="name_chat" />
 <input type="submit" name="enter" id="enter" value="Soumettre" />
 </form>
 </div>';
}
?>

<style>
    <?php include 'style_chat.css'; ?>
</style>

<!doctype html>
<html lang="en">

<head>
    <title>Chat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="Images/logo.png">
    <link rel="stylesheet" href="style_chat.css" />
    <!--<link rel="stylesheet" href="style.css">-->
</head>

<body>
    <!-- NavBar -->
    <?php include("header.php"); ?>

    <?php

    $con = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
    $sql = 'SELECT * FROM compte';
    $result = mysqli_query($con, $sql);
    $verif=false;

    while ($row = mysqli_fetch_array($result)) {
        if ($result->num_rows > 0) {
            if ($row['conn'] == 1) {
                $verif=true;
                $_SESSION['name_chat']=$row['username'];
                if (!isset($_SESSION['name_chat'])) {
                    loginForm();
                } else {
    ?>
                    <div id="wrapper">
                        <div id="menu">
                            <p class="welcome">Bienvenue, <b><?php echo $_SESSION['name_chat']; ?></b></p>
                            <p class="logout"><a id="exit" href="#">Quitter la conversation</a></p>
                        </div>
                        <div id="chatbox">
                            <?php
                            if (file_exists("log.html") && filesize("log.html") > 0) {
                                $contents = file_get_contents("log.html");
                                echo $contents;
                            }
                            ?>
                        </div>
                        <form name="message" action="">
                            <input name="usermsg" type="text" id="usermsg" />
                            <input name="submitmsg" type="submit" id="submitmsg" value="Envoyer" />
                        </form>
                    </div>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        // jQuery Document
                        $(document).ready(function() {
                            $("#submitmsg").click(function() {
                                var clientmsg = $("#usermsg").val();
                                $.post("post.php", {
                                    text: clientmsg
                                });
                                $("#usermsg").val("");
                                return false;
                            });

                            function loadLog() {
                                var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement avant la requête
                                $.ajax({
                                    url: "log.html",
                                    cache: false,
                                    success: function(html) {
                                        $("#chatbox").html(html); //Insérez le log de chat dans la #chatbox div
                                        //Auto-scroll 
                                        var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement apres la requête
                                        if (newscrollHeight > oldscrollHeight) {
                                            $("#chatbox").animate({
                                                scrollTop: newscrollHeight
                                            }, 'normal'); //Défilement automatique 
                                        }
                                    }
                                });
                            }
                            setInterval(loadLog, 2500);
                            $("#exit").click(function() {
                                var exit = confirm("Voulez-vous vraiment mettre fin à la session ?");
                                if (exit == true) {
                                    window.location = "acceuil.php?logout=true";
                                }
                            });
                        });
                    </script>


    <?php
                }
            }
        }
    }
    if ($verif == false){
        echo "<center><h2 style='margin-top:60px;'><a href='verifcompte.php'>Veuillez vous connecter pour accéder au chat.</a></h2></center>";
    }
    ?>

    <?php include("footer.html"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="index.js"></script>-->
</body>

</html>