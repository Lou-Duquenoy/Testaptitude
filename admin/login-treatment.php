<?php 
    session_start();
    require_once '../bdd/bdd.php';
    
    $logout = isset($_GET['logout']);

    if($logout == 'true'){
        
        header("location: login.php");
        unset($_SESSION['user']);
        session_destroy();
        exit;
    }
    if(isset($_SESSION["user"])){
        header("location: ../index.php");
        exit;
    }
    else{
        // vérifier que les champs ne sont pas vides
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            // Convertir caractères spéciaux en entités HTML
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            // Prepare la requete qui va être rempli pour un programe exécutant les requêtes
            $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
            // Execute la requête
            $check->execute(array($email));
            // Stocker les données dans la variable
            $data = $check->fetch();
            // Confirme l'enregistrement dans la table en retournant le nombre de lignes
            $row = $check->rowCount();
            // l'utilisateur est présent
            if($row == 1)
            {
                //Vérifier si l'email est correct
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    // Hacher le mot de passe
                    $password = hash('sha256', $password);
                    // Valider le mot de passe
                    if($data['password'] === $password)
                    {
                        $_SESSION['user'] = $data['email'];
                        header('Location: ../index.php');
                        die();
                    }
                    
            // Redirection erreur        
                    else header('Location: login.php?login_err=password');
                }else header('Location: login.php?login_err=email');
            }else header('Location: login.php?login_err=already');
        }

    }
    

    