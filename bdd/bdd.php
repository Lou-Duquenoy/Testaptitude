<?php
            $bdd = NULL;
            
            //On essaie de se connecter
            try
            {
	        $bdd= new PDO('mysql:host=localhost;dbname=testaptitude;charset=utf8', 'root', '');
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            // echo 'Connexion réussie';
?>
