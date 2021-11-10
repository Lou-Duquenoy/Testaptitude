<?php
// Si le bouton ajouter est cliqué
if (isset($_POST['add']))
{               
    // Données pour la photo
    $img_name = $_FILES['icon_url']['name'];
    $img_size = $_FILES['icon_url']['size'];    
    $temp_name = $_FILES['icon_url']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $tabExtension = explode('.', $img_name);
    $extension = strtolower(end($tabExtension));
    
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg'];
    $maxSize = 500000;
    
    // Verifier qu'une image est présente
    if(isset($img_name) and !empty($img_name)){
        // Vérifier les extensions et la taille de l'image
        if(in_array($extension, $extensions) && $img_size <= $maxSize){
            $location = 'img/';      
            move_uploaded_file($temp_name, $location.$img_name);
                
        }
        else{
            echo "Mauvaise extension ou taille trop grande";
        }
    } else {
        echo 'You should select a file to upload !!';
    }
    $poids =$_POST['poids'];
    $prix =$_POST['prix'];
    $date_de_peremption =$_POST['date_de_peremption'];
    
    $bdd->exec("INSERT INTO produits(icon_url, poids, prix, date_de_peremption) VALUES('$img_name','$poids','$prix','$date_de_peremption')");
}
?>