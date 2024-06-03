<?php
// Démarrer la session
session_start();

include 'decl_var_produits.php';
// définir le titre de la page
$titre_page="Produits - Foodtastic";
 
// entête de la page
include 'market_header.php';
include 'affiche_produits.php';
// pied de page
include 'market_footer.php';
?>