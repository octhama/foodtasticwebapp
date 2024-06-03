<?php
// Démarrer la session
session_start();
 
// récupérer l'id du produit
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
// supprimer l'article depuis le tableau
unset($_SESSION['panier'][$id]);
 
// redirection vers la liste des produits et signaler à l'utilisateur ce qui à été retirer du panier
header('Location: panier.php?action=supprimer&id=' . $id);
?>