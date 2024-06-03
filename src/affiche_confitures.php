<?php
	
echo "<div class='col-md-12'>";
    if($action=='ajouter'){
        echo "<div class='alert alert-info'>";
            echo "Article ajouter au panier!";
        echo "</div>";
    }
 
    if($action=='existe_deja'){
        echo "<div class='alert alert-info'>";
            echo "Cet article existe déjà dans votre panier!";
        echo "</div>";
    }
echo "</div>";

// lire tout les produits de la bdd
$decl=$produit->lireParCategorieJam($num_article, $articles_par_page);
 
// compter le nombre de produits récupérer
$num = $decl->rowCount();
 
// si les produits récupérer sont plus grand que zero
if($num>0){
    // montrer les articles correspondant
    include_once "nos_confitures.php";
}
 
// signaler à l'utilisateur si il n'y a aucun produit dans la bdd
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>Aucun produit n'est disponible pour le moment.</div>";
    echo "</div>";
}
?>