<?php 
    require_once __DIR__.'/../../bdd/bdd.php';

    if(!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
        $check = $bdd->prepare('SELECT token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row){
            // Création du token
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token'];

            $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
            $insert->execute(array($token_user, $token));

            // Création du lien
            $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

            echo "<a href='$link'>Lien</a>";
        }else{
            echo "Compte non existant";
           
        }
    }



    