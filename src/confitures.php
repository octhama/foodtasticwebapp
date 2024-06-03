<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// titre de la page
$titre_page="Confitures - Foodtastic";
 
include 'market_header.php';
include 'affiche_confitures.php';
include 'market_footer.php';
?>