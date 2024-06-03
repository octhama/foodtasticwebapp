<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// définir le titre de la page
$titre_page="Légumes - Foodtastic";
 
include 'market_header.php';
include 'affiche_legumes.php';
include 'market_footer.php';
?>