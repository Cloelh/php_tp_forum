<?php
    if(
        !empty($_POST['pseudo']) AND 
        !empty($_POST['mail']) AND 
        !empty($_POST['mdp']))
        {
       
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']);


        if(strlen($pseudo) < 255) {
            if (strlen($pseudo) < 255) {
                    $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
                    $reqpseudo->execute(array($pseudo));
                    $pseudoexist = $reqpseudo->rowCount();

                    if($pseudoexist == 0){
                            $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->rowCount(); //si une ligne est renvoyé, l'email existe déjà dans la bdd

                            if($mailexist == 0) {
                                    $insertUser = $bdd->prepare("INSERT INTO user(pseudo, mail, password) VALUES(?, ?, ?)");
                                    $insertUser->execute(array($pseudo, $mail, $mdp));
                                    header("Location: index.php?action=connexion&messageInscription=votre compte a bien été crée");
                            } else {
                                echo "l'email existe déjà";
                            }
                    } else {
                        echo "le pseudo existe déjà ";
                    }
            }   else {
                echo "mdp trop long";
            }
        } else {
            echo "pseudo trop long ";
        }
    }

?>