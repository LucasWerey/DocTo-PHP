<!--https://www.243tech.com/creer-une-barre-de-recherche-sur-son-site-php-mysql/-->

<?php

//Référence à la page précédente
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'acceuil.php';

if (isset($_GET['terme'])) {
    $db = mysqli_connect('localhost', 'root', 'root', 'omnessante') or die('could not connect to database');
    $terme = mysqli_real_escape_string($db, htmlspecialchars($_GET['terme']));
    if ($terme !== "") {
        $requete = "SELECT * FROM medecins WHERE nom LIKE '" . $terme . "' or prenom LIKE '" . $terme . "' or spe LIKE '" . $terme . "' ";
        $exec_requete = mysqli_query($db, $requete) or die(mysqli_error($db));
        $total = mysqli_num_rows($exec_requete);

        if ($total > 0) {
            while ($reponse = mysqli_fetch_array($exec_requete)) {
                $spe = $reponse['spe'];
                $nom = $reponse['nom'];
                $prenom = $reponse['prenom'];

                $terme = strtolower($terme);
                if ($terme == strtolower("Generaliste") || $terme == strtolower("Généraliste")) {
                    header('Location: medgenerale.html');
                } elseif (strtolower($spe) == $terme) {
                    header("Location: " . $terme . ".php");
                } elseif (strtolower($nom) == $terme || strtolower($prenom) == $terme) {
                    $spe = strtolower($spe);
                    if ($spe == strtolower("Generaliste") || $spe == strtolower("Généraliste")) {
                        header('Location: medgenerale.html');
                    } else {
                        header("Location: " . $spe . ".php");
                    }
                }
            }
        } else {
            //Retour à la page précédente
            header("Location: " . $referer . "?erreur=1"); // Terme non trouvé dans la table
        }
    } else {
        //Retour à la page précédente
        header("Location: " . $referer . "?erreur=2"); // Terme vide
    }
} else {
    //Retour à la page précédente
    header("Location: " . $referer . ".php?erreur=3"); //Le $terme n'existe pas
}
mysqli_close($db); // fermer la connexion
?>