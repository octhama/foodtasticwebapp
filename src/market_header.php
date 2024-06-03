<?php
// définition de la session panier ayant pour valeur tableau
$_SESSION['panier']=isset($_SESSION['panier']) ? $_SESSION['panier'] : array();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($titre_page) ? $titre_page : "Boutique - Foodtastic"; ?></title>
 
    <!-- Latest Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/market.css" />

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>-->
    
    <!--AngularJS Framework
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
 
</head>
<body>
 
    <?php include 'market_navigation.php'; ?>
 
    <!-- container -->
    <div class="container">
        <div class="row">
 
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($titre_page) ? $titre_page : "Boutique - Foodtastic"; ?></h1>
            </div>
        </div>