<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// Définir le titre de la page
$titre_page="Biscuits - Foodtastic";
 
include 'market_header.php';
include 'affiche_biscuits.php';
include 'market_footer.php';
?>