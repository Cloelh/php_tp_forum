<?php
// Voici la liste des actions possibles avec la page à charger associée

$listeDesActions = array(
    //vues
    "" => "vues/home.php",
    "home" => "vues/home.php",
    "connexion" => "vues/connexion.php",
    "createPost" => "vues/createPost.php",
    "pagePost" => "vues/pagePost.php",
    "pageCategorie" => "vues/pageCategorie.php",
    "myPost" => "vues/myPost.php",

    //traitement
    "register" => "traitement/register.php",
    "login" => "traitement/login.php",
    "logout" => "traitement/logout.php",
    "newPost" => "traitement/newPost.php",
    "sendResponse" => "traitement/sendResponse.php",
    "validerPost" => "traitement/validerPost.php",

)

?>