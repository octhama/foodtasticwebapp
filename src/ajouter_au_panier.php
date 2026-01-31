<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$quantite = isset($_GET['quantite']) ? (int) $_GET['quantite'] : 1;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$redirect_to_product = isset($_GET['from_product_page']); // logic if we want to redirect back to product

$quantite = $quantite <= 0 ? 1 : $quantite;

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Logic: if exists, we might want to Add to existing quantity or just notify.
// The original logic redirected with "existe_deja" or "ajouter".
// Let's keep it simple: if it exists, we update quantity or just say it's there.
// Original said: "existe_deja".

if (array_key_exists($id, $_SESSION['panier'])) {
    // Optional: Increment quantity provided?
    // $_SESSION['panier'][$id]['quantite'] += $quantite;

    // For now, keep original behavior: notify it exists.
    $action = "existe_deja";
} else {
    $_SESSION['panier'][$id] = array('quantite' => $quantite);
    $action = "ajouter";
}

// Redirect back to where we came from roughly
// If we have a referer, use it? Or default to products/categories.
// The original scripts passed 'page' but it wasn't very robust.
// We'll redirect to the referer if available, or produits.php

$return_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'produits.php';

// Append action params
if (strpos($return_url, '?') !== false) {
    $return_url .= "&action=" . $action . "&id=" . $id;
} else {
    $return_url .= "?action=" . $action . "&id=" . $id;
}

header("Location: " . $return_url);
exit();
?>