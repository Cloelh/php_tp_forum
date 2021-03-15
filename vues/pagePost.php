<?php

    if(isset($_GET['idPost'])){
        $idPost = $_GET['idPost'];
        $reqPost = $bdd->prepare('SELECT * FROM post WHERE id=?');
        $reqPost->execute(array($idPost));
        $post = $reqPost->fetch();
    }

    $reqResp = $bdd->prepare('SELECT * FROM reponse WHERE id_post=? ORDER BY id DESC');
    $reqResp->execute(array($idPost));
    $nbResp = $reqResp->rowCount();

?>

<div class="pagePost marge d-flex">
    <div class="col-8 border border-1 p-5">
        <div class="post border border-1 p-3">
            <h2><?=$post['title']?></h2>
            <p><?=$post['content']?></p>
            <a class="button d-flex align-items-center justify-content-center" href="#repondre">Répondre<img src="images/bulle.svg" alt="pen" width="20px"></a>
        </div>

        <div class="reponse">
            <b><?=$nbResp?> reponses</b>
            <?php while($r = $reqResp->fetch()){ ?>
                <?php
                    $reqAuteur = $bdd->prepare('SELECT * FROM user WHERE id=?');
                    $reqAuteur->execute(array($r['id_user']));
                    $auteur = $reqAuteur->fetch();    
                ?>
                <div class="response border border-1 p-3 d-flex align-items-start">
                    <img src="images/user.svg" alt="user" width="40px" class="me-2">
                    <div class="text">
                        <b><?=$auteur['pseudo']?></b>
                        <p><?=$r['reponse']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="repondre">
            <form id="repondre" action="index.php?action=sendResponse&idPost=<?=$post['id']?>" method="POST">
                <div class="mb-3">
                    <label for="response">Repondre : </label>
                    <input class="form-control" type="text" name="response" id="response">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
            </form>
        </div>
    </div>
    
    <div class="right col-4 border border-1">
        <div class="newletter border border-1 p-5 d-flex align-items-center justify-content-center">
            <p>s'inscrire à notre newlette</p>
        </div>
        <div class="pub border border-1 p-5 d-flex align-items-center justify-content-center">
            <p>pub</p>
        </div>
        <div class="pub border border-1 p-5 d-flex align-items-center justify-content-center">
            <p>pub</p>
        </div>
        <div class="pub border border-1 p-5 d-flex align-items-center justify-content-center">
            <p>pub</p>
        </div>
        <div class="pub border border-1 p-5 d-flex align-items-center justify-content-center">
            <p>pub</p>
        </div>
    </div>

</div>