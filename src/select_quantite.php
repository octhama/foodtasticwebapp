<?php
// Démarrer la session
session_start();
 
// récupérer l'id du produit
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quantity = isset($_GET['quantite']) ? $_GET['quantite'] : "";
 
// mettre la quantité à 1 au minimum
$quantity=$quantity<=0 ? 1 : $quantity;
 
// supprimer l'article depuis le tableau
unset($_SESSION['panier'][$id]);
 
// ajouter un article avec la mise à jour de la quantité
$_SESSION['panier'][$id]=array(
    'quantite'=>$quantity
);
 
// redirection vers la liste des produits et signaler à l'utilisateur ce qui a été retirer ou ajouter au panier
header('Location: panier.php?action=select_quantite&id=' . $id);
?>