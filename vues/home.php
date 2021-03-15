<?php

    $reqCat = $bdd->prepare('SELECT * FROM cat');
    $reqCat->execute();

    $reqPost = $bdd->prepare('SELECT * FROM post ORDER BY id DESC');
    $reqPost->execute();
    $nbPost = $reqPost->rowCount();
?>



<div class="home marge d-flex">

    <div class="feed col-8 border border-1 p-5">
        <a class="button d-flex align-items-center justify-content-center" href="index.php?action=createPost">Poser votre question<img src="images/pen.svg" alt="pen" width="20px"></a>
        
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
                        <span class="categorie"><a href="index.php?action=pageCategorie&idCat=<?=$cat['id']?>"><?=$cat['categorie']?></a></span>
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