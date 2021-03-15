<?php

if(isset($_SESSION['id'])){
    $idUser = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];


    $reqPost = $bdd->prepare('SELECT * FROM post WHERE id_user=? ORDER BY id DESC');
    $reqPost->execute(array($idUser));
    $nbPost = $reqPost->rowCount();

} else {
    // TODO : retour à la connexion
}

?>


<div class="myPost marge d-flex">
<div class="feed col-8 border border-1 p-5">
    <h2 class="mb-4">Mes post</h2>
    <p><b><?=$pseudo?></b></p>
        
        <div class="mt-5">
            <div class="resultatNb"><?=$nbPost?> résultat(s)</div>
            <?php while($p = $reqPost->fetch()){ ?>
                <div class="post d-flex align-items-start mb-5 border border-1 p-3">
                    <?php
                        $idCat = $p['id_cat'];
                        $catPost = $bdd->prepare('SELECT * FROM cat WHERE id=?');
                        $catPost->execute(array($idCat));
                        $cat = $catPost->fetch();
                    ?>
                    <img src="images/user.svg" alt="user" class="me-2" width="40px">
                    <div class="text">
                        <h4><a href="index.php?action=pagePost&idPost=<?=$p['id']?>"><?=$p['title']?></a></h4>
                        <p><?=$p['content']?></p>
                        <div class="d-flex">
                            <?php if($p['valider'] == 0) { ?>
                                <span class="valider"><a href="index.php?action=validerPost&idPost=<?=$p['id']?>">Valider le post</a></span>
                            <?php } else { ?>
                                <span class="valider">Ce post à été validé et fermé</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
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