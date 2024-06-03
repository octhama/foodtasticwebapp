<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// définir le titre de la page
$titre_page="Vins - Foodtastic";
 
include 'market_header.php';
include 'affiche_vins.php';
include 'market_footer.php';
?>