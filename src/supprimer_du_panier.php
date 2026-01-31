<?php
// Simply start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = isset($_GET['id']) ? $_GET['id'] : "";

if ($id) {
    unset($_SESSION['panier'][$id]);
}

header('Location: panier.php?action=supprimer&id=' . $id);
exit();
?>