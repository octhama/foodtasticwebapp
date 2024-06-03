<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// titre de la page
$titre_page="Fruits - Foodtastic";
 
include 'market_header.php';
include 'affiche_fruits.php';
include 'market_footer.php';
?>