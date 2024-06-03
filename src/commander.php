<?php
// Démarrer la session
session_start();
// titre de page
$titre_page="Merci pour votre commande!";
 
// entête de la page
include_once 'market_header.php';
 
echo "<div class='col-md-12'>";
 
    // signalé a l'utilisateur que sa commande a été bien reçu
    echo "<div class='alert alert-success'>";
        echo "<strong>Votre commande a été bien reçu !</strong> Merci beaucoup !";
    echo "</div>";
 
echo "</div>";
 
 echo "<div class='col-md-12'>";
 
    // pour générer la facture 
    echo "<div class='alert alert-success'>";
        echo "<strong>Cliquez" . "<a href='facture.php' target='_blank'> ici</a>" ." pour retirer votre facture !</strong> A très bientôt pour la réception de vos commandes Foodtastic !";
    echo "</div>";
 
echo "</div>";
// pied de page
include_once 'market_footer.php';
?>