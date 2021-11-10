<?php 
include('../bdd/bdd.php');
/* API REST */
$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
  case 'GET':
    if(!empty($_GET["id"]))
    {
      // Récupérer un seul produit
      $id = intval($_GET["id"]);
      getProducts($id);
    }
    else
    {
      // Récupérer tous les produits
      getProducts();
    }
    break;
  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;

    case 'POST':
      // Ajouter un produit
      AddProduct();
      break;
}
function utf8_urldecode($price){
  
}
function getProducts()
{
    global $bdd;
    $resultat = $bdd->query("SELECT * FROM produits");
    $response = array();
     while($row = $resultat->fetch(PDO::FETCH_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>
