<?php

// connection à la bdd
include 'bddconnect/bdd.php';

// inclure les objets
include_once "objets/Produit.php";
include_once "objets/ImageProduit.php";

// étalibir la connection à la bdd
$bdd = new Bdd();
$db = $bdd->connectoBdd();

// initialisation des objets
$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// pour prevenir d'avertissement par rapport a l'index non défini
$action = isset($_GET['action']) ? $_GET['action'] : "";

// pour la pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page est la page en cours, si il y a rien de défni comme page, page 1 reste la page par défaut
$articles_par_page = 8; // permet de définir le nombre d'élément ou d'article à charger ou à afficher par page
$num_article = ($articles_par_page * $page) - $articles_par_page; // calcul permettant de gérer le chargement des pages lors du changement de numéro de page

  ?>
