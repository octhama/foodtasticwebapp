<?php
// Démarrer la session
session_start();
 
// Récupération de l'id du produit
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantite = isset($_GET['quantite']) ? $_GET['quantite'] : 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// Initialiser la quantité de produits a 1 au minimum
$quantite=$quantite<=0 ? 1 : $quantite;
 
// Ajouter un nouvelle article au tableau
$article_panier=array(
    'quantite'=>$quantite
);
 
/*
 Verifier si la session tableau de 'Panier' a été créer
 Si ce n'est pas le cas, créer la session tableau de 'Panier'
 */
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}
 
// vérifier si un article a déjà été ajouter au panier, si tel est le cas, ne plus l'ajouter
if(array_key_exists($id, $_SESSION['panier'])){
    // rediretcion vers la liste des produits et signaler à l'utilisateur ce qui a été ajouter au panier
    header('Location: produits.php?action=existe_deja&id=' . $id . '&page=' . $page);
}
 
// sinon ajouter l'article au tableau
else{
    $_SESSION['panier'][$id]=$article_panier;
 
    // rediretcion vers la liste des produits et signaler à l'utilisateur ce qui a été ajouter au panier
    header('Location: produits.php?action=ajouter&page=' . $page);
}
?>