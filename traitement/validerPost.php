<?php

    if(isset($_GET['idPost'])){
        $idUser = $_SESSION['id'];
        $idPost = $_GET['idPost'];

        $reqPost = $bdd->prepare('SELECT * FROM post WHERE id=?');
        $reqPost->execute(array($idPost));
        $post = $reqPost->fetch();
        // echo $reqPost->rowCount();

        $idAuteur = $post['id_user'];


        if($idAuteur == $idUser){
            $validatePost = $bdd->prepare('UPDATE post SET valider = 1 WHERE id = ?');
            $validatePost->execute(array($idPost));
            header("Location: index.php?action=myPost");
        } else {
        //    echo "vous n'êtes pas autoriser à valider cette question";
        }
    } else {
        echo "pas d'idPost";
    }

?>