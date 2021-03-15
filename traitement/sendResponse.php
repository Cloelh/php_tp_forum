<?php

    if(isset($_POST['response']) AND isset($_SESSION['id']) AND isset($_GET['idPost'])){
        $contenu = $_POST['response'];
        $idAuteur = $_SESSION['id'];
        $idPost = $_GET['idPost'];
        $valider = 0;

        $insertResp = $bdd->prepare("INSERT INTO reponse(`id_user`, `reponse`, `id_post`, `valider`) VALUES(?, ?, ?, ?)");
        $insertResp->execute(array($idAuteur, $contenu, $idPost, $valider));
        header("Location: index.php?action=pagePost&idPost=".$idPost);
    }   else {
        echo "non";
    }


?>