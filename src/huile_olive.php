<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// titre de page
$titre_page="Huile d'olive - Foodtastic";
 
include 'market_header.php';
include 'affiche_huile_olive.php';
include 'market_footer.php';
?>