<?php
session_start();
if(isset($_SESSION['name_chat'])){
 $text = $_POST['text'];

 //echo "<h2>".$text."</h2>";
 
 $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='username'>".$_SESSION['name_chat']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
 // file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
 
 $myfile = fopen(__DIR__ . "/log.html", "a") or die("Impossible d'ouvrir le fichier " . __DIR__ . "/log.html");
 fwrite($myfile, $text_message);
 fclose($myfile);
}
?>