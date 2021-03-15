<?php
    echo $_POST['postContent'];

    if(!empty($_POST['postTitle']) AND !empty($_POST['postContent']) AND !empty($_POST['cat'])){
        $title = $_POST['postTitle'];
        $content = $_POST['postContent'];
        $idCat = $_POST['cat'];

        if(isset($_SESSION['id'])){
            $idAuteur = $_SESSION['id'];
            if(strlen($title) < 255 ) {
                $insertPost = $bdd->prepare("INSERT INTO post(title, content, id_user, id_cat, valider) VALUES(?, ?, ?, ?, ?)");
                $insertPost->execute(array($title, $content, $idAuteur, $idCat, 0));
                header("Location: index.php?action=home");
            } else {
                echo "titre top long";
            }
        } else {
            echo "vous n'êtes pas connecté";
        }
    } else {
        echo "remplir tous les champs ";
    }


?>