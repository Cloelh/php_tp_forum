<?php

    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) ){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $connectVerif = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $connectVerif->execute(array($pseudo));

        if( ($connectVerif->rowCount()) == 1 ){
            $userInfo = $connectVerif->fetch();

            if($mdp == $userInfo['password']){
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['mdp'] = $userInfo['mdp'];
                header("Location: index.php?action=home");
            } else {
                // mauvais mot de passe
            }
        } else {
            // ce compte n'existe pas 
        }
    } else{
        // remplir tous les champs
    }

?>