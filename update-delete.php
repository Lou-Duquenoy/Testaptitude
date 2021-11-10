<?php
// Soumission formulaire

$current_products = NULL;
// If button action clicked and is for  update
if(isset ($_GET['action']) && $_GET['action']=='update'){
    $id = $_GET['id']; 
    $reponse_page_products_data = $bdd->query("SELECT * FROM produits WHERE id=".$id);
    
    while ($donnees = $reponse_page_products_data->fetch()) : 
        $current_products = $donnees;
    endwhile;}
    // If big button update clicked
    if (isset($_POST['update'])){
        $poids =$_POST['poids'];
        $prix =$_POST['prix'];
        $date_de_peremption =$_POST['date_de_peremption'];
        $bdd->exec("UPDATE produits SET poids='$poids', prix='$prix', date_de_peremption='$date_de_peremption' WHERE id=".$id );
    }
    // If button action is clicked and is for delete
    if(isset ($_GET['action']) && $_GET['action']=='delete'){
        $id = $_GET['id']; 
        $bdd->exec("DELETE FROM produits WHERE id=".$id);
    }  
?>