<?php

$reqCat = $bdd->prepare('SELECT * FROM cat');
    $reqCat->execute();

?>

<div class="newPost marge d-flex">
    <div class="addPost col-8 border border-1 p-5">
        <form class="col-12" method="post" action="index.php?action=newPost">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Titre du post</label>
                <input type="text" class="form-control" id="postTitle" name="postTitle">
            </div>
            <div class="mb-3">
                <label for="postContent" class="form-label">Contenu du post</label>
                <input type="text" class="form-control" id="postContent" name="postContent">
            </div>
            <div class="mb-3">
                <label for="cat">Catégorie</label>
                <select class="form-select" name="cat" id="cat">
                    <option selected>Choisir une catégorie</option>
                    <?php while ($c = $reqCat->fetch()){  ?>
                        <option value="<?=$c['id']?>"><?=$c['categorie']?></option>
                    <?php } ?>  
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Poster</button>
        </form>
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
    