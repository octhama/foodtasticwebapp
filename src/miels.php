<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';

// définir le titre de la page
$titre_page="Miels - Foodtastic";
 
include 'market_header.php';
include 'affiche_miels.php';
include 'market_footer.php';
?>