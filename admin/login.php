<?php require '../bdd/bdd.php' ?>
<?php require 'login-treatment.php' ?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" type="text/css" href="../css/main.css" media="all">
           
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form-bloc">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form class="login-form" action=""  method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    <span id="emailMsg"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="password"id=password  class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    <span id="passMsg"></span>
                </div>
                <div class="form-group-button">
                    <button type="submit" id="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
                <p class="text-center"><a href="inscription.php">Inscription</a></p>
            <p class="text-center"><a href="mot-de-passe-oublié.php">Mot de passe oublié</a></p>   
            </form>
           
        </div>
        <style>
            html{
                background-color:blue;
            }
            .login-form {
                padding: 30px;
                border: 1px solid #f1f1f1;
                background: #fff;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
                margin: 0 auto;
                margin-top: 10%;    
            }
            input{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            
            .form-group-button{
                text-align:center;
            }
            button[type=submit] {
                background-color: blue;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 50%;    
            }
            .text-center{
                text-align:center;
            }
        </style>
        </body>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/main.js"></script>
</html>