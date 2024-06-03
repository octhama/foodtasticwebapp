<?php
	
echo "<div class='col-md-12'>";
    if($action=='ajouter'){
        #...
    }
 
    if($action=='existe_deja'){
        echo "<div class='alert alert-info'>";
            echo "Cet article existe déjà dans votre panier!";
        echo "</div>";
    }
echo "</div>";

// read all products in the database
$decl=$produit->read($num_article, $articles_par_page);
 
// count number of retrieved products
$num = $decl->rowCount();
 
// if products retrieved were more than zero
if($num>0){
    // needed for paging
    $page_url="produits.php?";
    $nbr_lignes=$produit->count();
 
    // show products
    include_once "nos_produits.php";
}
 
// tell the user if there's no products in the database
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>Aucun produit n'est disponible pour le moment.</div>";
    echo "</div>";
}
?>