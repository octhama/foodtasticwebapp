<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantite = isset($_GET['quantite']) ? (int) $_GET['quantite'] : 1;

// Ensure minimum quantity is 1
$quantite = $quantite <= 0 ? 1 : $quantite;

if ($id && isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id]['quantite'] = $quantite;
    header('Location: panier.php?action=select_quantite&id=' . $id);
} else {
    // If item not in cart, redirect to cart anyway
    header('Location: panier.php');
}
exit();
?>