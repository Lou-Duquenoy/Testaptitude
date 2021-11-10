<?php require '../bdd/bdd.php'?>
<?php
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    $uppercase = preg_match('@[A-Z]@', $password);/* Comporte au moins un caractère majuscule */
    $lowercase = preg_match('@[a-z]@', $password);/* Comporte au moins un caractère minuscule */
    $number    = preg_match('@[0-9]@', $password);/* Comporte  au moins 1 chiffre */

    if($row == 0){ 
        if(strlen($pseudo) <= 100){
            if(strlen($email) <= 100){
                
                if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                            $password = hash('sha256', $password);
                            $ip = $_SERVER['REMOTE_ADDR'];
                            $token = bin2hex(openssl_random_pseudo_bytes(24));

                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, ip , token) VALUES(:pseudo, :email, :password, :ip , :token)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                                'token' => $token
                            ));

                            header('Location:inscription.php?reg_err=success');
                        }else header('Location: inscription.php?reg_err=password');
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?password_number_letter_length');
            }else header('Location: inscription.php?reg_err=email_length');
        }else header('Location: inscription.php?reg_err=pseudo_length');
    }else header('Location: inscription.php?reg_err=already');
}