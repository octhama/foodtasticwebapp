<?php
$titre_page = "Biscuits - Foodtastic";
require_once 'includes/header.php';

// Action messages
if ($action == 'ajouter') {
    echo "<div class='alert alert-success animate__animated animate__fadeInDown'>Article ajouté au panier !</div>";
}
if ($action == 'existe_deja') {
    echo "<div class='alert alert-info animate__animated animate__fadeInDown'>Cet article est déjà dans votre panier.</div>";
}

// Fetch products
$decl = $produit->lireParCategorieCookie($num_article, $articles_par_page);
$num = $decl->rowCount();
$nbr_lignes = $num;
$page_url = "biscuits.php?";

include_once "includes/product_display.php";

require_once 'includes/footer.php';
?>