<?php
// Configuration base
define('APP_NAME', 'Foodtastic');
define('BASE_URL', '/'); // Adjusted for local PHP server with -t src

// Database configuration handled by the Bdd class in bddconnect/bdd.php

// Helper to get absolute path from base
function url($path)
{
    return BASE_URL . ltrim($path, '/');
}

// Session management
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Global initialization
require_once __DIR__ . "/../bddconnect/bdd.php";
require_once __DIR__ . "/../models/Produit.php";
require_once __DIR__ . "/../models/ImageProduit.php";

$bdd = new Bdd();
$db = $bdd->connectoBdd();

$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// Action and pagination defaults
$action = isset($_GET['action']) ? $_GET['action'] : "";
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$articles_par_page = 8;
$num_article = ($articles_par_page * $page) - $articles_par_page;
?>