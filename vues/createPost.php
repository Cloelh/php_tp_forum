<?php

$reqCat = $bdd->prepare('SELECT * FROM cat');
    $reqCat->execute();

?>

<div class="newPost">
    <form class="col-4" method="post" action="index.php?action=newPost">
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
    