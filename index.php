<?php require_once 'bdd/bdd.php';?> 
<?php require_once 'add.php';?>
<?php require_once 'update-delete.php';?> 

<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" media="all">
</head>

<body>

<form method="post" action="" enctype="multipart/form-data">
    <h1>Maintenance de produit alimentaire</h1>
    <?php   
    // si la session n'existe pas
    if(!isset($_SESSION["user"]))
    {
        session_start();
        // detruire les variables de session
        session_unset();
        // detruire la session
        session_destroy();
        header("location: admin/login.php");
        exit;    
        // detruire les variables de session
    }   
?>
    <h2>Bonjour <?php echo $_SESSION['user']?> </h2>
    <a class="cta" href="http://localhost/testaptitude/admin/login.php?logout">Se déconnecter</a>

    <h2>Ajouter/modifier supprimer un produit</h2>
    <label >Url icone :</label>
    <input type="file" name="icon_url" id="icon_url" autocomplete="off">
    <label >Poids :</label>
    <input type="text" name="poids" id="poids" autocomplete="off" value="<?php echo is_array($current_products) ? $current_products['poids'] : '' ; ?>" />
    <label >Prix :</label>
    <input type="text" name="prix" id="prix" autocomplete="off" value="<?php echo is_array($current_products) ? $current_products['prix'] : '' ; ?>" />
    <label >Date :</label>
    <input type="text" name="date_de_peremption" autocomplete="off" id="date_de_peremption" value="<?php echo is_array($current_products) ? $current_products['date_de_peremption'] : '' ; ?>" />
    
    <!-- Hide the two buttons and replace one another after a click  -->
    <?php if(isset ($_GET['action']) && $_GET['action']=='update'):?>
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <input type="submit" name="update" value="Mettre a jour"/>    
    <?php else : ?>
        <input type="submit" name="add" value="Ajouter"/>    
    <?php endif;?>
</form>
<?php $reponse_page_products_update = $bdd->query("SELECT * FROM produits");?>

<table>
<tr>
    <th>Id</th>
    <th>Url icone</th>
    <th>poids</th>
    <th>prix</th>
    <th>date de peremption</th>
    <th>action</th>
</tr>

<!-- Show data stocked in bdd one by one -->
<?php while ($donnees = $reponse_page_products_update->fetch()) : ?>
    <tr>
        <td><?php echo $donnees['id'];?></td>
        <td><img src="img/<?php echo $donnees['icon_url']; ?>"></td>
        <td><?php echo $donnees['poids'];?></td>
        <td><?php echo $donnees['prix'];?></td>
        <td><?php echo $donnees['date_de_peremption'];?></td>
        <td>
            <a href="index.php?id=<?php echo $donnees['id'] ?>&action=update">Modifier</a>
            <a href="index.php?id=<?php echo $donnees['id'] ?>&action=delete">Supprimer</a>   
        </td>
    </tr>
<?php endwhile ; ?>
</table>

</body>
</html>